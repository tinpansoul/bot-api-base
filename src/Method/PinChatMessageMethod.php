<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\MessageIdVariableTrait;

/**
 * Class PinChatMessageMethod.
 *
 * @see https://core.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessageMethod implements PinMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use MessageIdVariableTrait;

    /**
     * Optional. Pass True, if it is not necessary to send a notification to all chat members about the new
     * pinned message. Notifications are always disabled in channels.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(int|string $chatId, int $messageId, array $data = null): PinChatMessageMethod
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
