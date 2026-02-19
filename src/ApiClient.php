<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class ApiClient.
 */
class ApiClient implements ApiClientInterface
{
    private ?string $botKey = null;

    private ?string $endPoint = null;

    /**
     * ApiApiClient constructor.
     */
    public function __construct(
        private readonly RequestFactoryInterface $requestFactory, private readonly StreamFactoryInterface $streamFactory, private readonly ClientInterface $client)
    {
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function send(string $method, BotApiRequestInterface $botApiRequest): mixed
    {
        $request = $this->requestFactory->createRequest(method: 'POST', uri: $this->generateUri(method: $method));

        $boundary = \uniqid(prefix: '', more_entropy: true);

        $stream = $this->streamFactory->createStream(content: $this->createStreamBody(boundary: $boundary, botApiRequest: $botApiRequest));

        $response = $this->client->sendRequest(
            request: $request
            ->withHeader(name: 'Content-Type', value: 'multipart/form-data; boundary="' . $boundary . '"')
            ->withBody(body: $stream));

        $content = $response->getBody()->getContents();

        return \json_decode(json: $content, associative: false);
    }

    public function setBotKey(string $botKey): void
    {
        $this->botKey = $botKey;
    }

    public function setEndpoint(string $endPoint): void
    {
        $this->endPoint = $endPoint;
    }

    protected function generateUri(string $method): string
    {
        return \sprintf(
            '%s/bot%s/%s',
            $this->endPoint,
            $this->botKey,
            $method
        );
    }

    protected function createStreamBody(mixed $boundary, BotApiRequestInterface $botApiRequest): string
    {
        $stream = '';
        foreach ($botApiRequest->getData() as $name => $value) {
            // todo [GreenPlugin] fix type cast and replace it to normalizer
            $stream .= $this->createDataStream(boundary: $boundary, name: $name, value: (string) $value);
        }

        foreach ($botApiRequest->getFiles() as $name => $file) {
            $stream .= $this->createFileStream(boundary: $boundary, name: $name, inputFileType: $file);
        }

        return '' !== $stream ? $stream . "--{$boundary}--\r\n" : '';
    }

    /**
     * @param $boundary
     * @param $name
     */
    protected function createFileStream($boundary, $name, InputFileType $inputFileType): string
    {
        $headers = \sprintf(
            "Content-Disposition: form-data; name=\"%s\"; filename=\"%s\"\r\n",
            $name,
            $inputFileType->getBasename()
        );
        $headers .= \sprintf("Content-Length: %s\r\n", (string) $inputFileType->getSize());
        $headers .= \sprintf("Content-Type: %s\r\n", \mime_content_type(filename: $inputFileType->getRealPath()));

        $streams = "--{$boundary}\r\n{$headers}\r\n";
        $streams .= \file_get_contents(filename: $inputFileType->getRealPath());

        return $streams . "\r\n";
    }

    /**
     * @param $boundary
     * @param $name
     * @param $value
     */
    protected function createDataStream(string $boundary, string $name, string $value): string
    {
        $headers = \sprintf("Content-Disposition: form-data; name=\"%s\"\r\n", $name);
        $headers .= \sprintf("Content-Length: %s\r\n", (string) \strlen(string: $value));

        return "--{$boundary}\r\n{$headers}\r\n{$value}\r\n";
    }
}
