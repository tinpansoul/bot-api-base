<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class DeleteChatStickerSetMethod.
 *
 * @see https://core.telegram.org/bots/api#deletechatstickerset
 */
class DeleteChatStickerSetMethod implements DeleteMethodAliasInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): DeleteChatStickerSetMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
