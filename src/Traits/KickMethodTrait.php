<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\KickChatMemberMethod;

trait KickMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function kick(KickMethodAliasInterface $kickMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function kickChatMember(KickChatMemberMethod $kickChatMemberMethod): bool
    {
        return $this->kick(kickMethodAlias: $kickChatMemberMethod);
    }
}
