<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class GetChatMenuButtonMethod.
 *
 * Use this method to get the current value of the bot's menu button in a private chat,
 * or the default menu button. Returns MenuButton on success.
 *
 * @see https://core.telegram.org/bots/api#getchatmenubutton
 */
class GetChatMenuButtonMethod implements MethodInterface
{
    use FillFromArrayTrait;

    /**
     * Optional. Unique identifier for the target private chat. If not specified, default bot's menu button will be returned.
     *
     * @var int|null
     */
    public $chatId;

    /**
     * GetChatMenuButtonMethod constructor.
     *
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $data = null): GetChatMenuButtonMethod
    {
        $static = new static();
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
