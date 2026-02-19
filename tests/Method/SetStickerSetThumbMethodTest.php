<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SetStickerSetThumbMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

final class SetStickerSetThumbMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->setStickerSetThumb(setStickerSetThumbMethod: $this->getMethod());
        $this->getApi()->set(setMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'setStickerSetThumb',
            request: [
                'name' => 'stickerSetName',
                'user_id' => 1,

                'thumb' => '',
            ],
            fileMap: ['thumb' => true],
            result: true
        );
    }

    private function getMethod(): SetStickerSetThumbMethod
    {
        return SetStickerSetThumbMethod::create(
            name: 'stickerSetName',
            userId: 1,
            thumb: InputFileType::create(path: '/dev/null')
        );
    }
}
