<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class StickerSetType.
 *
 * @see https://core.telegram.org/bots/api#stickerset
 */
class StickerSetType
{
    /**
     * Sticker set name.
     *
     * @var string
     */
    public $name;

    /**
     * Sticker set title.
     *
     * @var string
     */
    public $title;

    /**
     * if the sticker set contains masks.
     *
     * @var bool|null
     */
    public $containsMasks;

    /**
     * True, if the sticker set contains animated stickers.
     *
     * @var bool
     */
    public $isAnimated;

    /**
     * List of all set stickers.
     *
     * @var StickerType[]
     */
    public $stickers;

    /**
     * Optional. Sticker set thumbnail in the .WEBP or .TGS format.
     *
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”.
     *
     * @var string|null
     */
    public $stickerType;

    /**
     * Optional. Sticker set thumbnail in the .WEBP, .TGS or .WEBM format.
     *
     * @var PhotoSizeType|null
     */
    public $thumbnail;
}
