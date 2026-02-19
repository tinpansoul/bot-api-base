<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetStickerPositionInSetMethod;

final class SetStickerPositionInSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setStickerPositionInSet',
            request: ['sticker' => 'sticker', 'position' => 'position'],
            result: true
        );

        $botApiComplete->setStickerPositionInSet(setStickerPositionInSetMethod: SetStickerPositionInSetMethod::create(sticker: 'sticker', position: 'position'));
    }
}
