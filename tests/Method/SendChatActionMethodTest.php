<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SendChatActionMethod;

final class SendChatActionMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'sendChatAction', request: [
            'chat_id' => 'chat_id',
            'action' => SendChatActionMethod::ACTION_FIND_LOCATION,
        ], result: true);

        $botApiComplete->sendChatAction(
            sendChatActionMethod: SendChatActionMethod::create(
            chatId: 'chat_id',
            action: SendChatActionMethod::ACTION_FIND_LOCATION
        ));
    }
}
