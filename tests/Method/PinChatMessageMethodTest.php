<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\PinChatMessageMethod;

final class PinChatMessageMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'pinChatMessage', request: [
            'chat_id' => 'chat_id',
            'message_id' => 1,
            'disable_notification' => true,
        ], result: true);

        $botApiComplete->pinChatMessage(
            pinChatMessageMethod: PinChatMessageMethod::create(
            chatId: 'chat_id',
            messageId: 1,
            data: ['disableNotification' => true]
        ));
    }
}
