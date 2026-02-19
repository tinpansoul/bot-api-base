<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatMemberMethod;

final class GetChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getChatMember', request: ['chat_id' => 'chat_id', 'user_id' => 1]);

        $botApiComplete->getChatMember(getChatMemberMethod: GetChatMemberMethod::create(chatId: 'chat_id', userId: 1));
    }
}
