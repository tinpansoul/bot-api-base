<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChatJoinRequestType.
 *
 * Represents a join request sent to a chat.
 *
 * @see https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequestType
{
    /**
     * Chat to which the request was sent.
     *
     * @var ChatType
     */
    public $chat;

    /**
     * User that sent the join request.
     *
     * @var UserType
     */
    public $from;

    /**
     * Identifier of a private chat with the user who sent the join request. The bot can use this
     * identifier for 5 minutes to send messages until the join request is processed, assuming no
     * other administrator contacted the user.
     *
     * @var int
     */
    public $userChatId;

    /**
     * Date the request was sent.
     *
     * @var \DateTimeImmutable
     */
    public $date;

    /**
     * Optional. Bio of the user.
     *
     * @var string|null
     */
    public $bio;

    /**
     * Optional. Chat invite link that was used by the user to send the join request.
     *
     * @var ChatInviteLinkType|null
     */
    public $inviteLink;

    /**
     * Optional. Unique identifier of the join request query, which can be answered using
     * answerChatJoinRequestQuery.
     *
     * @var string|null
     */
    public $queryId;
}
