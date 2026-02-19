<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use TgBotApi\BotApiBase\Exception\BadRequestException;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\WebhookFetcher;

final class WebhookFetcherTest extends TestCase
{
    use GetNormalizerTrait;

    /**
     * @throws BadRequestException
     */
    public function testHandleWebhook(): void
    {
        $webhookFetcher = new WebhookFetcher(normalizer: $this->getNormalizer());
        $updateType = $webhookFetcher->fetch(request: $this->getRequest(contents: '{"a":"b"}'));
        $this->assertInstanceOf(expected: UpdateType::class, actual: $updateType);
    }

    /**
     * @throws BadRequestException
     */
    public function testHandleWebhookError(): void
    {
        $this->expectException(exception: BadRequestException::class);

        $webhookFetcher = new WebhookFetcher(normalizer: $this->getNormalizer());
        $webhookFetcher->fetch(request: $this->getRequest(contents: '[]'));
    }

    /**
     * @throws BadRequestException
     */
    public function testHandleWebhookWithString(): void
    {
        $webhookFetcher = new WebhookFetcher(normalizer: $this->getNormalizer());
        $updateType = $webhookFetcher->fetch(request: '{"a":"b"}');
        $this->assertInstanceOf(expected: UpdateType::class, actual: $updateType);
    }

    private function getRequest(string $contents): MockObject
    {
        $request = $this->getMockBuilder(className: RequestInterface::class)->getMock();
        $body = $this->getMockBuilder(className: StreamInterface::class)->getMock();
        $body->expects($this->once())->method(constraint: 'getContents')->willReturn(value: $contents);
        $request->expects($this->once())->method(constraint: 'getBody')->willReturn(value: $body);

        return $request;
    }
}
