<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;

/**
 * Trait UnbanMethodTrait.
 */
trait UnbanMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function unban(UnbanMethodAliasInterface $unbanMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function unbanChatMember(UnbanChatMemberMethod $unbanChatMemberMethod): bool
    {
        return $this->unban(unbanMethodAlias: $unbanChatMemberMethod);
    }
}
