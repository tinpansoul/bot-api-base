<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatMembersCountMethod.
 *
 * @see https://core.telegram.org/bots/api#getchatmemberscount
 */
class GetChatMembersCountMethod implements MethodInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): GetChatMembersCountMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
