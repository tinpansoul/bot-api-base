<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class KickChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#kickchatmember
 */
class KickChatMemberMethod implements KickMethodAliasInterface
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
     * KickChatMemberMethod constructor.
     *
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(int|string $chatId, int $userId, array $data = null): KickChatMemberMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->userId = $userId;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
