<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\BanChatMemberMethod;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\KickChatMemberMethod;

trait KickMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function kick(KickMethodAliasInterface $kickMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function banChatMember(BanChatMemberMethod $banChatMemberMethod): bool
    {
        return $this->kick(kickMethodAlias: $banChatMemberMethod);
    }

    /**
     * @throws ResponseException
     *
     * @deprecated Telegram renamed this method to "banChatMember" in the Bot API; it is absent from the
     *             current documentation. Use banChatMember() instead.
     */
    public function kickChatMember(KickChatMemberMethod $kickChatMemberMethod): bool
    {
        return $this->kick(kickMethodAlias: $kickChatMemberMethod);
    }
}
