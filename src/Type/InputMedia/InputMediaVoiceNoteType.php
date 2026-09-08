<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMedia;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputMediaVoiceNoteType.
 *
 * Represents a voice note to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediavoicenote
 */
class InputMediaVoiceNoteType extends InputMediaType
{
    use FillFromArrayTrait;

    public const TYPE_VOICE_NOTE = 'voice_note';

    /**
     * Optional. Duration of the voice note in seconds.
     *
     * @var int|null
     */
    public $duration;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|InputFileType $media, ?array $data = null): InputMediaVoiceNoteType
    {
        $static = new static();
        $static->media = $media;
        $static->type = self::TYPE_VOICE_NOTE;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
