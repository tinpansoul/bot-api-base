<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\CaptionVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Use this method to edit captions of messages. On success, if the edited message is not an inline message,
 * the edited Message is returned, otherwise True is returned.
 *
 * @see https://core.telegram.org/bots/api#editmessagecaption
 */
class EditMessageCaptionMethod implements HasParseModeVariableInterface, EditMethodAliasInterface
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;
    use CaptionVariablesTrait;

    /**
     * @param $chatId
     *
     * @throws BadArgumentException
     */
    public static function create($chatId, int $messageId, array $data = null): EditMessageCaptionMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->messageId = $messageId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId', 'messageId', 'inlineMessageId']);
        }

        return $static;
    }

    /**
     * @throws BadArgumentException
     */
    public static function createInline(string $inlineMessageId, array $data = null): EditMessageCaptionMethod
    {
        $static = new static();
        $static->inlineMessageId = $inlineMessageId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId', 'messageId', 'inlineMessageId']);
        }

        return $static;
    }
}
