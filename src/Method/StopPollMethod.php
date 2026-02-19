<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\MessageIdVariableTrait;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

/**
 * Class StopPollMethod
 * Use this method to stop a poll which was sent by the bot.
 * On success, the stopped Poll with the final results is returned.
 *
 * @see https://core.telegram.org/bots/api#stoppoll
 */
class StopPollMethod implements MethodInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use MessageIdVariableTrait;

    /**
     * Optional. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     * instructions to remove reply keyboard or to force a reply from the user.
     *
     * @var InlineKeyboardMarkupType
     */
    public $replyMarkup;

    /**
     * @param array|null $data
     *
     */
    public static function create(string $chatId, int $messageId, array $data = null): self
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->messageId = $messageId;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
