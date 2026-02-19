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
