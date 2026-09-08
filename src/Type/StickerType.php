<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class StickerType.
 *
 * @see https://core.telegram.org/bots/api#sticker
 */
class StickerType
{
    /**
     * Unique identifier for this file.
     *
     * @var string
     */
    public $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    public $fileUniqueId;

    /**
     * Sticker width.
     *
     * @var int
     */
    public $width;

    /**
     * Sticker height.
     *
     * @var int
     */
    public $height;

    /**
     * Optional. Sticker thumbnail in the "webp" or "jpg" format.
     *
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. Emoji associated with the sticker.
     *
     * @var string|null
     */
    public $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs.
     *
     * @var string|null
     */
    public $setName;

    /**
     * Optional. For mask stickers, the position where the mask should be placed.
     *
     * @var MaskPositionType|null
     */
    public $maskPosition;

    /**
     * Optional. File size.
     *
     * @var int|null
     */
    public $fileSize;

    /**
     * True, if the sticker is animated.
     *
     * @var bool
     */
    public $isAnimated;

    /**
     * Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is
     * independent from its format, which is determined by the fields is_animated and is_video.
     *
     * @var string|null
     */
    public $type;

    /**
     * True, if the sticker is a video sticker.
     *
     * @var bool|null
     */
    public $isVideo;

    /**
     * Optional. For custom emoji stickers, unique identifier of the custom emoji.
     *
     * @var string|null
     */
    public $customEmojiId;

    /**
     * Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium
     * badge in emoji status, white color on chat photos, or another appropriate color in other places.
     *
     * @var bool|null
     */
    public $needsRepainting;

    /**
     * Optional. Sticker thumbnail in the .WEBP or .JPG format.
     *
     * @var PhotoSizeType|null
     */
    public $thumbnail;

    /**
     * Optional. For premium regular stickers, premium animation for the sticker.
     *
     * @var FileType|null
     */
    public $premiumAnimation;
}
