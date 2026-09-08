<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class CreateChatInviteLinkMethod.
 *
 * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat
 * for this to work and must have the appropriate administrator rights. Returns the new invite link as a
 * ChatInviteLink object.
 *
 * @see https://core.telegram.org/bots/api#createchatinvitelink
 */
class CreateChatInviteLinkMethod implements CreateMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;

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
    public static function create(int|string $chatId, ?array $data = null): CreateChatInviteLinkMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
