<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Tests\GetNormalizerTrait;
use TgBotApi\BotApiBase\Type\FileType;

final class GetAbsoluteFilePathTest extends TestCase
{
    use GetNormalizerTrait;

    public function testMethod(): void
    {
        /** @var ApiClientInterface $stub */
        $stub = $this->getMockBuilder(className: ApiClientInterface::class)->getMock();

        $botApiComplete = new BotApiComplete(
            botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
            apiClient: $stub,
            normalizer: $this->getNormalizer(),
            endPoint: 'endpoint'
        );

        $fileType = new FileType();
        $fileType->filePath = 'path';

        $absolutePath = $botApiComplete->getAbsoluteFilePath(fileType: $fileType);

        $this->assertEquals(expected: 'endpoint/file/bot000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/path', actual: $absolutePath);
    }
}
