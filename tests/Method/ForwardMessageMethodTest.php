<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

final class ForwardMessageMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws BadArgumentException
     * @throws ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'forwardMessage',
            request: [
                'chat_id' => 'chat_id',
                'from_chat_id' => 'chat_id',
                'message_id' => 1,
                'disable_notification' => true,
            ]
        );

        $botApiComplete->forwardMessage(
            forwardMessageMethod: ForwardMessageMethod::create(
            chatId: 'chat_id',
            fromChatId: 'chat_id',
            messageId: 1,
            data: ['disableNotification' => true]
        ));
    }
}
