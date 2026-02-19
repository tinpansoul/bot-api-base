<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class DeleteChatPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#deletechatphoto
 */
class DeleteChatPhotoMethod implements DeleteMethodAliasInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): DeleteChatPhotoMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
