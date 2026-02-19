<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class GetChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberMethod implements MethodInterface
{
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    public static function create(int|string $chatId, int $userId): GetChatMemberMethod
    {
        $instance = new self();
        $instance->chatId = $chatId;
        $instance->userId = $userId;

        return $instance;
    }
}
