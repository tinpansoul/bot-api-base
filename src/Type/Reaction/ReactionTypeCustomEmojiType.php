<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Reaction;

/**
 * Class ReactionTypeCustomEmojiType.
 *
 * A reaction based on a custom emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypecustomemoji
 */
class ReactionTypeCustomEmojiType extends ReactionTypeType
{
    /**
     * Custom emoji identifier.
     *
     * @var string
     */
    public $customEmojiId;

    public static function create(string $customEmojiId): ReactionTypeCustomEmojiType
    {
        $static = new static();
        $static->type = self::TYPE_CUSTOM_EMOJI;
        $static->customEmojiId = $customEmojiId;

        return $static;
    }
}
