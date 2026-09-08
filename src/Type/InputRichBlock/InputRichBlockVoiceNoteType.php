<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaVoiceNoteType;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockVoiceNoteType.
 *
 * A InputRichBlockVoiceNote element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvoicenote
 */
class InputRichBlockVoiceNoteType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The voice note. Caption is ignored.
     *
     * @var InputMediaVoiceNoteType
     */
    public $voiceNote;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(InputMediaVoiceNoteType $voiceNote, ?array $data = null): InputRichBlockVoiceNoteType
    {
        $static = new static();
        $static->type = self::TYPE_VOICE_NOTE;
        $static->voiceNote = $voiceNote;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
