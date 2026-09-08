<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Reaction;

/**
 * Class ReactionTypeEmojiType.
 *
 * A reaction based on an emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypeemoji
 */
class ReactionTypeEmojiType extends ReactionTypeType
{
    /**
     * Reaction emoji.
     *
     * @var string
     */
    public $emoji;

    public static function create(string $emoji): ReactionTypeEmojiType
    {
        $static = new static();
        $static->type = self::TYPE_EMOJI;
        $static->emoji = $emoji;

        return $static;
    }
}
