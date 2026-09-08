<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SetStickerSetThumbnailMethod.
 *
 * Use this method to set the thumbnail of a regular or mask sticker set. Returns True on success.
 * Replaces the method previously known as setStickerSetThumb.
 *
 * @see https://core.telegram.org/bots/api#setstickersetthumbnail
 */
class SetStickerSetThumbnailMethod implements SetMethodAliasInterface
{
    /**
     * Sticker set name.
     *
     * @var string
     */
    public $name;

    /**
     * User identifier of the sticker set owner.
     *
     * @var int
     */
    public $userId;

    /**
     * Optional. A .WEBP or .PNG image, a .TGS animation, or a .WEBM video with the thumbnail.
     * Pass a file_id as a String to send a file that already exists on the Telegram servers,
     * pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * or upload a new one using multipart/form-data.
     * If omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail.
     *
     * @var InputFileType|string|null
     */
    public $thumbnail;

    /**
     * Format of the thumbnail, must be one of "static", "animated" or "video".
     *
     * @var string
     */
    public $format;

    public static function create(
        string $name,
        int $userId,
        string $format,
        string|InputFileType|null $thumbnail = null,
    ): SetStickerSetThumbnailMethod {
        $static = new static();
        $static->name = $name;
        $static->userId = $userId;
        $static->format = $format;
        $static->thumbnail = $thumbnail;

        return $static;
    }
}
