<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMedia;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputMediaPhotoType.
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhotoType extends InputMediaType
{
    use FillFromArrayTrait;

    /**
     * Optional. Pass True if the caption must be shown above the message media
     *
     * @var bool|null
     */
    public $showCaptionAboveMedia;

    /**
     * Optional. Pass True if the photo needs to be covered with a spoiler animation
     *
     * @var bool|null
     */
    public $hasSpoiler;

    /**
     * @param array|null           $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|InputFileType $media, array $data = null): InputMediaPhotoType
    {
        $static = new static();
        $static->media = $media;
        $static->type = static::TYPE_PHOTO;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
