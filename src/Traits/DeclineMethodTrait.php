<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\DeclineChatJoinRequestMethod;
use TgBotApi\BotApiBase\Method\Interfaces\DeclineMethodAliasInterface;

trait DeclineMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function decline(DeclineMethodAliasInterface $declineMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function declineChatJoinRequest(DeclineChatJoinRequestMethod $declineChatJoinRequestMethod): bool
    {
        return $this->decline(declineMethodAlias: $declineChatJoinRequestMethod);
    }
}
