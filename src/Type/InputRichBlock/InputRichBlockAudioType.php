<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAudioType;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockAudioType.
 *
 * A InputRichBlockAudio element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockaudio
 */
class InputRichBlockAudioType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The audio. Caption is ignored.
     *
     * @var InputMediaAudioType
     */
    public $audio;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(InputMediaAudioType $audio, ?array $data = null): InputRichBlockAudioType
    {
        $static = new static();
        $static->type = self::TYPE_AUDIO;
        $static->audio = $audio;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
