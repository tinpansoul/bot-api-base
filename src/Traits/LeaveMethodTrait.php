<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\LeaveChatMethod;

/**
 * Trait LeaveMethodTrait.
 */
trait LeaveMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function leave(LeaveMethodAliasInterface $leaveMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function leaveChat(LeaveChatMethod $leaveChatMethod): bool
    {
        return $this->leave(leaveMethodAlias: $leaveChatMethod);
    }
}
