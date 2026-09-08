<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Reaction;

/**
 * Class ReactionTypeType.
 *
 * Describes the type of a reaction. Use one of the concrete subclasses.
 *
 * @see https://core.telegram.org/bots/api#reactiontype
 */
abstract class ReactionTypeType
{
    public const TYPE_EMOJI = 'emoji';

    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';

    public const TYPE_PAID = 'paid';

    /**
     * Type of the reaction, one of the TYPE_* constants.
     *
     * @var string
     */
    public $type;
}
