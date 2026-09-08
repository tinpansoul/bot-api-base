<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeclineMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class DeclineChatJoinRequestMethod.
 *
 * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to
 * work and must have the can_invite_users administrator right. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#declinechatjoinrequest
 */
class DeclineChatJoinRequestMethod implements DeclineMethodAliasInterface
{
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    public static function create(int|string $chatId, int $userId): DeclineChatJoinRequestMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->userId = $userId;

        return $static;
    }
}
