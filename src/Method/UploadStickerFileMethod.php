<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class UploadStickerFileMethod.
 *
 * Use this method to upload a .png file with a sticker for later use in createNewStickerSet
 * and addStickerToSet methods (can be used multiple times). Returns the uploaded File on success.
 *
 * @see https://core.telegram.org/bots/api#uploadstickerfile
 */
class UploadStickerFileMethod implements UploadMethodAliasInterface
{
    /**
     * User identifier of sticker file owner.
     *
     * @var int
     */
    public $userId;

    /**
     * Png image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px,
     * and either width or height must be exactly 512px.
     *
     * @var InputFileType
     */
    public $pngSticker;

    public static function create(int $userId, InputFileType $inputFileType): UploadStickerFileMethod
    {
        $static = new static();
        $static->userId = $userId;
        $static->pngSticker = $inputFileType;

        return $static;
    }
}
