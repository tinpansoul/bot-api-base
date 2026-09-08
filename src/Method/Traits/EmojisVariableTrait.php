<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

/**
 * Trait EmojisVariableTrait.
 */
trait EmojisVariableTrait
{
    /**
     * One or more emoji corresponding to the sticker.
     *
     * @var string
     *
     * @deprecated The Bot API moved this into InputSticker::emoji_list. Set
     *             InputStickerType::$emojiList on the sticker instead.
     */
    public $emojis;
}
