<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class SetChatDescriptionMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionMethod implements SetMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;

    /**
     * Optional. New chat description, 0-255 characters.
     *
     * @var string|null
     */
    public $description;

    /**
     * @param array|null $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(int|string $chatId, array $data = null): SetChatDescriptionMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId']);
        }

        return $static;
    }
}
