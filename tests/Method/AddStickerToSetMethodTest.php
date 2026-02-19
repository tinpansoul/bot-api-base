<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AddStickerToSetMethod;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MaskPositionType;

final class AddStickerToSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBotWithFiles(
            methodName: 'addStickerToSet',
            request: [
                'user_id' => 1,
                'name' => 'name',
                'png_sticker' => '',
                'emojis' => '😀',
                'mask_position' => ['point' => 'forehead', 'x_shift' => 1.0, 'y_shift' => 1.0, 'scale' => 1],
            ],
            fileMap: ['png_sticker' => true],
            serializableFields: ['mask_position'],
            result: true
        );

        $botApiComplete->addStickerToSet(
            addStickerToSetMethod: AddStickerToSetMethod::create(
            userId: 1,
            name: 'name',
            pngSticker: InputFileType::create(path: '/dev/null'),
            emojis: '😀',
            data: [
                'maskPosition' => MaskPositionType::create(
                    point: MaskPositionType::MASK_POINT_FOREHEAD,
                    xShift: 1, yShift: 1, scale: 1),
            ]
        ));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeAnimated(): void
    {
        $botApiComplete = $this->getBotWithFiles(
            methodName: 'addStickerToSet',
            request: [
                'user_id' => 1,
                'name' => 'name',
                'tgs_sticker' => '',
                'emojis' => '😀',
                'mask_position' => ['point' => 'forehead', 'x_shift' => 1.0, 'y_shift' => 1.0, 'scale' => 1],
            ],
            fileMap: ['tgs_sticker' => true],
            serializableFields: ['mask_position'],
            result: true
        );

        $botApiComplete->addStickerToSet(
            addStickerToSetMethod: AddStickerToSetMethod::createAnimated(
            userId: 1,
            name: 'name',
            inputFileType: InputFileType::create(path: '/dev/null'),
            emojis: '😀',
            data: [
                'maskPosition' => MaskPositionType::create(
                    point: MaskPositionType::MASK_POINT_FOREHEAD,
                    xShift: 1, yShift: 1, scale: 1),
            ]
        ));
    }
}
