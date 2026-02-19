<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\CreateNewStickerSetMethod;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MaskPositionType;

final class CreateNewStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBotWithFiles(
            methodName: 'createNewStickerSet',
            request: [
                'user_id' => 1,
                'name' => 'sticker_set_name',
                'title' => 'title',
                'png_sticker' => '',
                'emojis' => '😀',
                'contains_masks' => true,
                'mask_position' => ['point' => 'forehead', 'x_shift' => 1.0, 'y_shift' => 1.0, 'scale' => 1],
            ],
            fileMap: ['png_sticker' => true],
            serializableFields: ['mask_position'],
            result: true
        );

        $botApiComplete->createNewStickerSet(
            createNewStickerSetMethod: CreateNewStickerSetMethod::create(
            userId: 1,
            name: 'sticker_set_name',
            title: 'title',
            pngSticker: InputFileType::create(path: '/dev/null'),
            emojis: '😀',
            data: [
                'containsMasks' => true,
                'maskPosition' => MaskPositionType::create(
                    point: MaskPositionType::MASK_POINT_FOREHEAD,
                    xShift: 1, yShift: 1, scale: 1),
            ]
        ));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testEncodeAnimated(): void
    {
        $botApiComplete = $this->getBotWithFiles(
            methodName: 'createNewStickerSet',
            request: [
                'user_id' => 1,
                'name' => 'sticker_set_name',
                'title' => 'title',
                'tgs_sticker' => '',
                'emojis' => '😀',
                'contains_masks' => true,
                'mask_position' => ['point' => 'forehead', 'x_shift' => 1.0, 'y_shift' => 1.0, 'scale' => 1],
            ],
            fileMap: ['tgs_sticker' => true],
            serializableFields: ['mask_position'],
            result: true
        );

        $botApiComplete->createNewStickerSet(
            createNewStickerSetMethod: CreateNewStickerSetMethod::createAnimated(
            userId: 1,
            name: 'sticker_set_name',
            title: 'title',
            inputFileType: InputFileType::create(path: '/dev/null'),
            emojis: '😀',
            data: [
                'containsMasks' => true,
                'maskPosition' => MaskPositionType::create(
                    point: MaskPositionType::MASK_POINT_FOREHEAD,
                    xShift: 1, yShift: 1, scale: 1),
            ]
        ));
    }
}
