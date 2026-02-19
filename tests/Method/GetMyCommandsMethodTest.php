<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetMyCommandsMethod;

final class GetMyCommandsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getMyCommands', request: []);

        $botApiComplete->getMyCommands(getMyCommandsMethod: GetMyCommandsMethod::create());
    }
}
