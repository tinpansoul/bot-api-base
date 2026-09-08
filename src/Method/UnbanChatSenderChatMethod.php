<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class UnbanChatSenderChatMethod.
 *
 * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an
 * administrator for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#unbanchatsenderchat
 */
class UnbanChatSenderChatMethod implements UnbanMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * Unique identifier of the target sender chat.
     *
     * @var int
     */
    public $senderChatId;

    public static function create(int|string $chatId, int $senderChatId): UnbanChatSenderChatMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->senderChatId = $senderChatId;

        return $static;
    }
}
