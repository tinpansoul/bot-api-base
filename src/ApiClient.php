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
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly ClientInterface $client,
    ) {
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function send(string $method, BotApiRequestInterface $botApiRequest): mixed
    {
        $request = $this->requestFactory->createRequest('POST', $this->generateUri(method: $method));

        $boundary = uniqid(more_entropy: true);

        $stream = $this->streamFactory->createStream($this->createStreamBody(boundary: $boundary, botApiRequest: $botApiRequest));

        $response = $this->client->sendRequest(
            $request
                ->withHeader('Content-Type', 'multipart/form-data; boundary="' . $boundary . '"')
                ->withBody($stream)
        );

        $content = $response->getBody()->getContents();

        return json_decode(json: $content, associative: false);
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
            $stream .= $this->createDataStream(boundary: $boundary, name: $name, value: $this->encodeValue(value: $value));
        }

        foreach ($botApiRequest->getFiles() as $name => $file) {
            $stream .= $this->createFileStream(boundary: $boundary, name: $name, inputFileType: $file);
        }

        return '' !== $stream ? $stream . "--{$boundary}--\r\n" : '';
    }

    /**
     * Encodes a normalized value for a multipart/form-data field.
     *
     * Telegram types every parameter as String, Integer, Boolean, an object, or an array.
     * Booleans must go out as "true"/"false" - an empty string is not a valid Boolean in any
     * of the encodings the Bot API documents, and methods such as promoteChatMember and
     * answerPreCheckoutQuery rely on False being transmitted.
     * Arrays and objects must be JSON-serialized, which is what the Bot API asks for on every
     * "Array of ..." parameter.
     */
    protected function encodeValue(mixed $value): string
    {
        if (\is_bool(value: $value)) {
            return $value ? 'true' : 'false';
        }

        if (\is_array(value: $value) || \is_object(value: $value)) {
            return json_encode(value: $value, flags: \JSON_THROW_ON_ERROR);
        }

        return (string) $value;
    }

    protected function createFileStream($boundary, $name, InputFileType $inputFileType): string
    {
        $headers = \sprintf(
            "Content-Disposition: form-data; name=\"%s\"; filename=\"%s\"\r\n",
            $name,
            $inputFileType->getBasename()
        );
        $headers .= \sprintf("Content-Length: %s\r\n", (string) $inputFileType->getSize());
        $headers .= \sprintf("Content-Type: %s\r\n", mime_content_type(filename: $inputFileType->getRealPath()));

        $streams = "--{$boundary}\r\n{$headers}\r\n";
        $streams .= file_get_contents(filename: $inputFileType->getRealPath());

        return $streams . "\r\n";
    }

    protected function createDataStream(string $boundary, string $name, string $value): string
    {
        $headers = \sprintf("Content-Disposition: form-data; name=\"%s\"\r\n", $name);
        $headers .= \sprintf("Content-Length: %s\r\n", (string) \strlen(string: $value));

        return "--{$boundary}\r\n{$headers}\r\n{$value}\r\n";
    }
}
