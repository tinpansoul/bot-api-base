<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteChatStickerSetMethod;

final class DeleteChatStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'deleteChatStickerSet', request: ['chat_id' => 'chat_id'], result: true);

        $botApiComplete->deleteChatStickerSet(deleteChatStickerSetMethod: DeleteChatStickerSetMethod::create(chatId: 'chat_id'));
    }
}
