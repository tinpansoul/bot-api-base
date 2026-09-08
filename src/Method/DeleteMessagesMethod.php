<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class DeleteMessagesMethod.
 *
 * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be
 * found, they are skipped. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#deletemessages
 */
class DeleteMessagesMethod implements DeleteMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * A list of 1-100 identifiers of messages to delete. See deleteMessage for limitations on which messages can
     * be deleted.
     *
     * @var int[]
     */
    public $messageIds;

    public static function create(int|string $chatId, array $messageIds): DeleteMessagesMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->messageIds = $messageIds;

        return $static;
    }
}
