<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatAdministratorsMethod.
 *
 * @see https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsMethod implements MethodInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): GetChatAdministratorsMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
