<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\RevokeMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class RevokeChatInviteLinkMethod.
 *
 * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is
 * automatically generated. Returns the revoked invite link as a ChatInviteLink object.
 *
 * @see https://core.telegram.org/bots/api#revokechatinvitelink
 */
class RevokeChatInviteLinkMethod implements RevokeMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * The invite link to revoke.
     *
     * @var string
     */
    public $inviteLink;

    public static function create(int|string $chatId, string $inviteLink): RevokeChatInviteLinkMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->inviteLink = $inviteLink;

        return $static;
    }
}
