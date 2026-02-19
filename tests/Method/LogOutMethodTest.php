<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\LogOutMethod;

final class LogOutMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'logOut', request: [], result: true);

        $botApiComplete->logOut(logOutMethod: LogOutMethod::create());
    }
}
