<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatMethod;

final class GetChatMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getChat', request: ['chat_id' => 'chat_id']);

        $botApiComplete->getChat(getChatMethod: GetChatMethod::create(chatId: 'chat_id'));
    }
}
