<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class EditChatInviteLinkMethod.
 *
 * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in
 * the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link
 * as a ChatInviteLink object.
 *
 * @see https://core.telegram.org/bots/api#editchatinvitelink
 */
class EditChatInviteLinkMethod implements EditMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;

    /**
     * The invite link to edit.
     *
     * @var string
     */
    public $inviteLink;

    /**
     * Optional. Invite link name; 0-32 characters.
     *
     * @var string|null
     */
    public $name;

    /**
     * Optional. Point in time when the link will expire.
     *
     * @var \DateTimeInterface|null
     */
    public $expireDate;

    /**
     * Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat
     * via this invite link; 1-99999.
     *
     * @var int|null
     */
    public $memberLimit;

    /**
     * Optional. True, if users joining the chat via the link need to be approved by chat administrators. If True,
     * memberLimit can't be specified.
     *
     * @var bool|null
     */
    public $createsJoinRequest;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        int|string $chatId,
        string $inviteLink,
        ?array $data = null,
    ): EditChatInviteLinkMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->inviteLink = $inviteLink;

        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
