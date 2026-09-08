<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;
use TgBotApi\BotApiBase\Method\UnbanChatSenderChatMethod;

/**
 * Trait UnbanMethodTrait.
 */
trait UnbanMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function unban(UnbanMethodAliasInterface $unbanMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function unbanChatMember(UnbanChatMemberMethod $unbanChatMemberMethod): bool
    {
        return $this->unban(unbanMethodAlias: $unbanChatMemberMethod);
    }

    /**
     * @throws ResponseException
     */
    public function unbanChatSenderChat(UnbanChatSenderChatMethod $unbanChatSenderChatMethod): bool
    {
        return $this->unban(unbanMethodAlias: $unbanChatSenderChatMethod);
    }
}
