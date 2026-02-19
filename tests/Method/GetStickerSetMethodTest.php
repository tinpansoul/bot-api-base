<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetStickerSetMethod;

final class GetStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getStickerSet', request: ['name' => 'sicker_set_name']);

        $botApiComplete->getStickerSet(getStickerSetMethod: GetStickerSetMethod::create(name: 'sicker_set_name'));
    }
}
