<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use TgBotApi\BotApiBase\ApiClient;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiRequest;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class ApiClientTest.
 *
 * @todo write real test instead this
 */
final class ApiClientTest extends TestCase
{
    public function testApi(): void
    {
        $apiClient = $this->getApiClient();
        $this->assertInstanceOf(expected: ApiClientInterface::class, actual: $apiClient);
        $apiClient->send(method: 'getMe', botApiRequest: new BotApiRequest(data: ['name' => 'value'], files: [new InputFileType(filename: '/dev/null')]));
    }

    public function getRequestFactory(): RequestFactoryInterface
    {
        $requestFactory = $this->getMockBuilder(className: RequestFactoryInterface::class)
            ->getMock();

        $requestFactory->expects($this->once())
            ->method(constraint: 'createRequest')
            ->willReturn(value: ($this->createRequest()));

        /* @var RequestFactoryInterface $requestFactory */
        return $requestFactory;
    }

    public function getStreamFactory(): StreamFactoryInterface
    {
        $streamFactory = $this->getMockBuilder(className: StreamFactoryInterface::class)
            ->getMock();

        $stream = $this->getMockBuilder(className: StreamInterface::class)
            ->getMock();

        $streamFactory->expects($this->once())
            ->method(constraint: 'createStream')
            ->willReturn(value: $stream);

        /* @var StreamFactoryInterface $streamFactory */
        return $streamFactory;
    }

    public function getClient(): ClientInterface
    {
        $client = $this->getMockBuilder(className: ClientInterface::class)
            ->getMock();

        $response = $this->getMockBuilder(className: ResponseInterface::class)
            ->getMock();

        $stream = $this->getMockBuilder(className: StreamInterface::class)
            ->getMock();

        $stream->expects($this->once())
            ->method(constraint: 'getContents')
            ->willReturn(value: '{}');

        $response->expects($this->once())
            ->method(constraint: 'getBody')
            ->willReturn(value: $stream);

        $client->expects($this->once())
            ->method(constraint: 'sendRequest')
            ->willReturn(value: $response);

        /* @var ClientInterface $client */
        return $client;
    }

    public function createRequest(): RequestInterface
    {
        $request = $this->getMockBuilder(className: RequestInterface::class)
            ->getMock();

        $request->expects($this->once())
            ->method(constraint: 'withBody')
            ->willReturn(value: $request);

        $request->expects($this->once())
            ->method(constraint: 'withHeader')
            ->willReturn(value: $request);

        /* @var RequestInterface $request */
        return $request;
    }

    private function getApiClient(): ApiClientInterface
    {
        $apiClient = new ApiClient(requestFactory: $this->getRequestFactory(), streamFactory: $this->getStreamFactory(), client: $this->getClient());
        $apiClient->setBotKey(botKey: 'key');
        $apiClient->setEndpoint(endPoint: 'endpoint');

        return $apiClient;
    }
}
