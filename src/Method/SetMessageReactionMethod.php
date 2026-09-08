<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\MessageIdVariableTrait;
use TgBotApi\BotApiBase\Type\Reaction\ReactionTypeType;

/**
 * Class SetMessageReactionMethod.
 *
 * Use this method to change the chosen reactions on a message. Service messages of some types
 * can't be reacted to. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmessagereaction
 */
class SetMessageReactionMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;
    use MessageIdVariableTrait;

    /**
     * Optional. A list of reaction types to set on the message. Currently, as non-premium users,
     * bots can set up to one reaction per message. Pass an empty list to remove all reactions.
     *
     * @var ReactionTypeType[]|null
     */
    public $reaction;

    /**
     * Optional. Pass True to set the reaction with a big animation.
     *
     * @var bool|null
     */
    public $isBig;

    /**
     * @param ReactionTypeType[]|null $reaction
     */
    public static function create(
        int|string $chatId,
        int $messageId,
        ?array $reaction = null,
        ?bool $isBig = null,
    ): SetMessageReactionMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->messageId = $messageId;
        $static->reaction = $reaction;
        $static->isBig = $isBig;

        return $static;
    }
}
