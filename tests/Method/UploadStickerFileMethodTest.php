<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UploadStickerFileMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendStickerMethodTest.
 */
final class UploadStickerFileMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    public function testEncode(): void
    {
        $botApiComplete = $this->getBotWithFiles(methodName: 'uploadStickerFile', request: [
            'user_id' => 1,
            'png_sticker' => '',
        ], fileMap: ['png_sticker' => true], result: true);

        $botApiComplete->uploadStickerFile(
            uploadStickerFileMethod: UploadStickerFileMethod::create(
            userId: 1,
            inputFileType: InputFileType::create(path: '/dev/null')
        ));
    }
}
