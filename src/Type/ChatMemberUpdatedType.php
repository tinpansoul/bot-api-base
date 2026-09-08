<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChatMemberUpdatedType.
 *
 * Represents changes in the status of a chat member.
 *
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdatedType
{
    /**
     * Chat the user belongs to.
     *
     * @var ChatType
     */
    public $chat;

    /**
     * Performer of the action, which resulted in the change.
     *
     * @var UserType
     */
    public $from;

    /**
     * Date the change was done.
     *
     * @var \DateTimeImmutable
     */
    public $date;

    /**
     * Previous information about the chat member.
     *
     * @var ChatMemberType
     */
    public $oldChatMember;

    /**
     * New information about the chat member.
     *
     * @var ChatMemberType
     */
    public $newChatMember;

    /**
     * Optional. Chat invite link, which was used by the user to join the chat; for joining by
     * invite link events only.
     *
     * @var ChatInviteLinkType|null
     */
    public $inviteLink;

    /**
     * Optional. True, if the user joined the chat after sending a direct join request without
     * using an invite link and being approved by an administrator.
     *
     * @var bool|null
     */
    public $viaJoinRequest;

    /**
     * Optional. True, if the user joined the chat via a chat folder invite link.
     *
     * @var bool|null
     */
    public $viaChatFolderInviteLink;
}
