<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetFileMethod;

final class GetFileMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getFile', request: ['file_id' => 'file_id']);

        $botApiComplete->getFile(getFileMethod: GetFileMethod::create(fileId: 'file_id'));
    }
}
