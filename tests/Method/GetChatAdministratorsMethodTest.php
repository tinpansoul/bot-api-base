<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;

final class GetChatAdministratorsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getChatAdministrators', request: ['chat_id' => 1]);

        $botApiComplete->getChatAdministrators(getChatAdministratorsMethod: GetChatAdministratorsMethod::create(chatId: 1));
    }
}
