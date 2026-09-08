<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputStickerType.
 *
 * Describes a sticker to be added to a sticker set. Replaces the deprecated pngSticker,
 * tgsSticker, emojis and maskPosition fields on the sticker set methods.
 *
 * @see https://core.telegram.org/bots/api#inputsticker
 */
class InputStickerType
{
    use FillFromArrayTrait;

    public const FORMAT_STATIC = 'static';

    public const FORMAT_ANIMATED = 'animated';

    public const FORMAT_VIDEO = 'video';

    /**
     * The added sticker. Pass a file_id as a String to send a file that already exists on the
     * Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * or pass an InputFileType to upload a new one. Animated and video stickers can't be uploaded
     * via HTTP URL.
     *
     * @var InputFileType|string
     */
    public $sticker;

    /**
     * Format of the added sticker, must be one of "static" for a .WEBP or .PNG image,
     * "animated" for a .TGS animation, "video" for a .WEBM video.
     *
     * @var string
     */
    public $format;

    /**
     * List of 1-20 emoji associated with the sticker.
     *
     * @var string[]
     */
    public $emojiList;

    /**
     * Optional. Position where the mask should be placed on faces. For "mask" stickers only.
     *
     * @var MaskPositionType|null
     */
    public $maskPosition;

    /**
     * Optional. List of 0-20 search keywords for the sticker with total length of up to
     * 64 characters. For "regular" and "custom_emoji" stickers only.
     *
     * @var string[]|null
     */
    public $keywords;

    /**
     * @param string[] $emojiList
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        InputFileType|string $sticker,
        string $format,
        array $emojiList,
        ?array $data = null,
    ): InputStickerType {
        $static = new static();
        $static->sticker = $sticker;
        $static->format = $format;
        $static->emojiList = $emojiList;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
