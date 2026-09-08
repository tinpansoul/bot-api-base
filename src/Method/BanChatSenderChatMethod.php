<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class BanChatSenderChatMethod.
 *
 * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned,
 * the owner of the banned chat won't be able to send messages on behalf of any of their channels.
 * Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#banchatsenderchat
 */
class BanChatSenderChatMethod implements KickMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * Unique identifier of the target sender chat.
     *
     * @var int
     */
    public $senderChatId;

    public static function create(int|string $chatId, int $senderChatId): BanChatSenderChatMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->senderChatId = $senderChatId;

        return $static;
    }
}
