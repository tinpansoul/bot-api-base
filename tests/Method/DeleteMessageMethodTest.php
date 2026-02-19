<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteMessageMethod;

final class DeleteMessageMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'deleteMessage', request: ['chat_id' => 'chat_id', 'message_id' => 1], result: true);

        $botApiComplete->deleteMessage(deleteMessageMethod: DeleteMessageMethod::create(chatId: 'chat_id', messageId: 1));
    }
}
