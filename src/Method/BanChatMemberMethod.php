<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class BanChatMemberMethod.
 *
 * Use this method to ban a user in a group, a supergroup or a channel. Returns True on success.
 * Replaces the method previously known as kickChatMember.
 *
 * @see https://core.telegram.org/bots/api#banchatmember
 */
class BanChatMemberMethod implements KickMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Optional. Date when the user will be unbanned, \DateTimeInterface.
     * If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever.
     *
     * @var \DateTimeInterface|null
     */
    public $untilDate;

    /**
     * Optional. Pass True to delete all messages from the chat for the user that is being removed.
     * If False, the user will be able to see messages in the group that were sent before the user was removed.
     * Always True for supergroups and channels.
     *
     * @var bool|null
     */
    public $revokeMessages;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(int|string $chatId, int $userId, ?array $data = null): BanChatMemberMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->userId = $userId;
        if ($data) {
            $static->fill($data);
        }

        return $static;
    }
}
