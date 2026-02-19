<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class SetChatTitleMethod.
 *
 * @see https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * New chat title, 1-255 characters.
     *
     * @var string
     */
    public $title;

    public static function create(int|string $chatId, string $title): SetChatTitleMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->title = $title;

        return $static;
    }
}
