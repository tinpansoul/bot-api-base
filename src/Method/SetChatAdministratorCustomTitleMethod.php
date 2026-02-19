<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Use this method to set a custom title
 * for an administrator in a supergroup promoted by the bot. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setchatadministratorcustomtitle
 */
class SetChatAdministratorCustomTitleMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * @var string
     */
    public $customTitle;

    public static function create(int|string $chatId, int $userId, string $title): SetChatAdministratorCustomTitleMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->userId = $userId;
        $static->customTitle = $title;

        return $static;
    }
}
