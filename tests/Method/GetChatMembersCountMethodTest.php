<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatMembersCountMethod;

final class GetChatMembersCountMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getChatMembersCount', request: ['chat_id' => 'chat_id'], result: 1);

        $botApiComplete->getChatMembersCount(getChatMembersCountMethod: GetChatMembersCountMethod::create(chatId: 'chat_id'));
    }
}
