<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\LeaveChatMethod;

final class LeaveChatMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'leaveChat', request: ['chat_id' => 'chat_id'], result: true);

        $botApiComplete->leaveChat(leaveChatMethod: LeaveChatMethod::create(chatId: 'chat_id'));
    }
}
