<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatStickerSetMethod;

final class SetChatStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setChatStickerSet',
            request: ['chat_id' => 'chat_id', 'sticker_set_name' => 'sticker_set_name'],
            result: true
        );

        $botApiComplete->setChatStickerSet(setChatStickerSetMethod: SetChatStickerSetMethod::create(chatId: 'chat_id', stickerSetName: 'sticker_set_name'));
    }
}
