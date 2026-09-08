<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\RevokeMethodAliasInterface;
use TgBotApi\BotApiBase\Method\RevokeChatInviteLinkMethod;
use TgBotApi\BotApiBase\Type\ChatInviteLinkType;

trait RevokeMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function revoke(RevokeMethodAliasInterface $revokeMethodAlias): ChatInviteLinkType;

    /**
     * @throws ResponseException
     */
    public function revokeChatInviteLink(RevokeChatInviteLinkMethod $revokeChatInviteLinkMethod): ChatInviteLinkType
    {
        return $this->revoke(revokeMethodAlias: $revokeChatInviteLinkMethod);
    }
}
