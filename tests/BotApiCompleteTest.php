<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\GetMeMethod;

final class BotApiCompleteTest extends TestCase
{
    use GetNormalizerTrait;

    /**
     * @throws ResponseException
     */
    public function testException(): void
    {
        $stub = $this->getMockBuilder(className: ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method(constraint: 'send')
            ->willReturn(value: (object) (['ok' => false, 'description' => 'Exception']));

        /* @var ApiClientInterface $stub */
        $botApiComplete = new BotApiComplete(
            botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
            apiClient: $stub, normalizer: $this->getNormalizer());

        $this->expectException(exception: ResponseException::class);

        $botApiComplete->call(method: GetMeMethod::create());
    }
}
