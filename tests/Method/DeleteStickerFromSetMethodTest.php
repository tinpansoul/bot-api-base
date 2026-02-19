<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteStickerFromSetMethod;

final class DeleteStickerFromSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'deleteStickerFromSet', request: ['sticker' => 'file_id'], result: true);

        $botApiComplete->deleteStickerFromSet(deleteStickerFromSetMethod: DeleteStickerFromSetMethod::create(sticker: 'file_id'));
    }
}
