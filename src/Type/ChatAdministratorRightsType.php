<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChatAdministratorRightsType.
 *
 * Represents the rights of an administrator in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 */
class ChatAdministratorRightsType
{
    use \TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

    /**
     * True, if the user's presence in the chat is hidden.
     *
     * @var bool
     */
    public $isAnonymous;

    /**
     * True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel
     * members, report spam messages and ignore slow mode.
     *
     * @var bool
     */
    public $canManageChat;

    /**
     * True, if the administrator can delete messages of other users.
     *
     * @var bool
     */
    public $canDeleteMessages;

    /**
     * True, if the administrator can manage video chats.
     *
     * @var bool
     */
    public $canManageVideoChats;

    /**
     * True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics.
     *
     * @var bool
     */
    public $canRestrictMembers;

    /**
     * True, if the administrator can add new administrators.
     *
     * @var bool
     */
    public $canPromoteMembers;

    /**
     * True, if the user is allowed to change the chat title, photo and other settings.
     *
     * @var bool
     */
    public $canChangeInfo;

    /**
     * True, if the user is allowed to invite new users to the chat.
     *
     * @var bool
     */
    public $canInviteUsers;

    /**
     * True, if the administrator can post stories to the chat.
     *
     * @var bool
     */
    public $canPostStories;

    /**
     * True, if the administrator can edit stories posted by other users.
     *
     * @var bool
     */
    public $canEditStories;

    /**
     * True, if the administrator can delete stories posted by other users.
     *
     * @var bool
     */
    public $canDeleteStories;

    /**
     * Optional. True, if the administrator can post messages in the channel, or access channel statistics.
     *
     * @var bool|null
     */
    public $canPostMessages;

    /**
     * Optional. True, if the administrator can edit messages of other users and can pin messages.
     *
     * @var bool|null
     */
    public $canEditMessages;

    /**
     * Optional. True, if the user is allowed to pin messages.
     *
     * @var bool|null
     */
    public $canPinMessages;

    /**
     * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics.
     *
     * @var bool|null
     */
    public $canManageTopics;

    /**
     * Optional. True, if the administrator can manage direct messages of the channel.
     *
     * @var bool|null
     */
    public $canManageDirectMessages;

    /**
     * Optional. True, if the administrator can manage tags of the chat.
     *
     * @var bool|null
     */
    public $canManageTags;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(?array $data = null): ChatAdministratorRightsType
    {
        $static = new static();
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
