<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Type\InputMedia\InputMediaPhotoType;

/**
 * Class InputRichMessageMediaType.
 *
 * Describes one media item referenced from a rich message.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagemedia
 */
class InputRichMessageMediaType
{
    /**
     * Identifier the rich message content uses to refer to this media item.
     *
     * @var string
     */
    public $id;

    /**
     * The media itself.
     *
     * @var InputMediaPhotoType
     */
    public $media;

    public static function createPhoto(string $id, InputFileType|string $photo): InputRichMessageMediaType
    {
        $static = new static();
        $static->id = $id;
        $static->media = InputMediaPhotoType::create(media: $photo);

        return $static;
    }
}
