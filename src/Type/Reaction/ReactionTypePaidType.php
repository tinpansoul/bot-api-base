<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Reaction;

/**
 * Class ReactionTypePaidType.
 *
 * A paid reaction: Telegram Stars.
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 */
class ReactionTypePaidType extends ReactionTypeType
{
    public static function create(): ReactionTypePaidType
    {
        $static = new static();
        $static->type = self::TYPE_PAID;

        return $static;
    }
}
