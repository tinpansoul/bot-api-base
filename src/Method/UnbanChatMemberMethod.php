<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class UnbanChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#unbanchatmember
 */
class UnbanChatMemberMethod implements UnbanMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Do nothing if the user is not banned.
     *
     * @var bool|null
     */
    public $onlyIfBanned;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(int|string $chatId, int $userId, array $data = null): UnbanChatMemberMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->userId = $userId;

        if ($data !== null && $data !== []) {
            $static->fill(data: $data, forbidden: ['chatId', 'userId']);
        }

        return $static;
    }
}
