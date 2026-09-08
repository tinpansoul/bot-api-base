<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatMemberCountMethod.
 *
 * Use this method to get the number of members in a chat. Returns Int on success.
 * Replaces the method previously known as getChatMembersCount.
 *
 * @see https://core.telegram.org/bots/api#getchatmembercount
 */
class GetChatMemberCountMethod implements MethodInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): GetChatMemberCountMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
