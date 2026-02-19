<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteChatPhotoMethod;

final class DeleteChatPhotoMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'deleteChatPhoto', request: ['chat_id' => 'chat_id'], result: true);

        $botApiComplete->deleteChatPhoto(deleteChatPhotoMethod: DeleteChatPhotoMethod::create(chatId: 'chat_id'));
    }
}
