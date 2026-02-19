<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class LeaveChatMethod.
 *
 * @see https://core.telegram.org/bots/api#leavechat
 */
class LeaveChatMethod implements LeaveMethodAliasInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): LeaveChatMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
