<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class StopMessageLiveLocationType.
 *
 * @see https://core.telegram.org/bots/api#stopmessagelivelocation
 */
class StopMessageLiveLocationMethod implements StopMethodAliasInterface
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(int|string $chatId, int $messageId, array $data = null): StopMessageLiveLocationMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->messageId = $messageId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['messageId', 'chatId', 'inlineMessageId']);
        }

        return $static;
    }

    /**
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function createInline(string $inlineMessageId, array $data = null): StopMessageLiveLocationMethod
    {
        $static = new static();
        $static->inlineMessageId = $inlineMessageId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['messageId', 'chatId', 'inlineMessageId']);
        }

        return $static;
    }
}
