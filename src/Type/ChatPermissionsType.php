<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class ChatPermissionsType
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissionsType
{
    use FillFromArrayTrait;

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, locations and venues.
     *
     * @var bool
     */
    public $canSendMessages;

    /**
     * Optional. True, if the user is allowed to send
     * audios, documents, photos, videos, video notes and voice notes, implies can_send_messages.
     *
     * @var bool
     */
    public $canSendMediaMessages;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages.
     *
     * @var bool
     */
    public $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send
     * animations, games, stickers and use inline bots, implies can_send_media_messages.
     *
     * @var bool
     */
    public $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages,
     * implies can_send_media_messages.
     *
     * @var bool
     */
    public $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to change
     * the chat title, photo and other settings. Ignored in public supergroups.
     *
     * @var bool
     */
    public $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat.
     *
     * @var bool
     */
    public $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups.
     *
     * @var bool
     */
    public $canPinMessages;

    /**
     * Optional. True, if the user is allowed to send audios.
     *
     * @var bool|null
     */
    public $canSendAudios;

    /**
     * Optional. True, if the user is allowed to send documents.
     *
     * @var bool|null
     */
    public $canSendDocuments;

    /**
     * Optional. True, if the user is allowed to send photos.
     *
     * @var bool|null
     */
    public $canSendPhotos;

    /**
     * Optional. True, if the user is allowed to send videos.
     *
     * @var bool|null
     */
    public $canSendVideos;

    /**
     * Optional. True, if the user is allowed to send video notes.
     *
     * @var bool|null
     */
    public $canSendVideoNotes;

    /**
     * Optional. True, if the user is allowed to send voice notes.
     *
     * @var bool|null
     */
    public $canSendVoiceNotes;

    /**
     * Optional. True, if the user is allowed to react to messages. If omitted, defaults to the value of
     * can_send_messages.
     *
     * @var bool|null
     */
    public $canReactToMessages;

    /**
     * Optional. True, if the user is allowed to edit their own tag. If omitted, defaults to the value of
     * can_pin_messages.
     *
     * @var bool|null
     */
    public $canEditTag;

    /**
     * Optional. True, if the user is allowed to create forum topics. If omitted, defaults to the value of
     * can_pin_messages.
     *
     * @var bool|null
     */
    public $canManageTopics;

    public static function create(?array $data = null): ChatPermissionsType
    {
        $static = new static();
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
