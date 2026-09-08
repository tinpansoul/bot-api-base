<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAnimationType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAudioType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaPhotoType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaVideoType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaVoiceNoteType;

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
     * @var InputMediaType one of InputMediaAnimationType, InputMediaAudioType, InputMediaPhotoType,
     *                     InputMediaVideoType or InputMediaVoiceNoteType
     */
    public $media;

    public static function createPhoto(string $id, InputFileType|string $photo): InputRichMessageMediaType
    {
        return self::create(id: $id, media: InputMediaPhotoType::create(media: $photo));
    }

    public static function create(string $id, InputMediaType $media): InputRichMessageMediaType
    {
        $static = new static();
        $static->id = $id;
        $static->media = $media;

        return $static;
    }
}
