<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class ExportChatInviteLinkMethod.
 *
 * @see https://core.telegram.org/bots/api#exportchatinvitelink
 */
class ExportChatInviteLinkMethod implements MethodInterface
{
    use ChatIdVariableTrait;

    public static function create(int|string $chatId): ExportChatInviteLinkMethod
    {
        $static = new static();
        $static->chatId = $chatId;

        return $static;
    }
}
