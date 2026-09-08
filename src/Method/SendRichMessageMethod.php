<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputRichMessageType;

/**
 * Class SendRichMessageMethod.
 *
 * Use this method to send a rich message. On success, the sent Message is returned.
 *
 * @see https://core.telegram.org/bots/api#sendrichmessage
 */
class SendRichMessageMethod implements SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * The content of the message to be sent.
     *
     * @var InputRichMessageType
     */
    public $richMessage;

    /**
     * Optional. Unique identifier of the business connection on behalf of which the message
     * will be sent.
     *
     * @var string|null
     */
    public $businessConnectionId;

    /**
     * Optional. Unique identifier for the target message thread of a forum supergroup.
     *
     * @var int|null
     */
    public $messageThreadId;

    /**
     * Optional. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits
     * for a fee of 0.1 Telegram Stars per message.
     *
     * @var bool|null
     */
    public $allowPaidBroadcast;

    /**
     * Optional. Unique identifier of the message effect to be added to the message.
     *
     * @var string|null
     */
    public $messageEffectId;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        int|string $chatId,
        InputRichMessageType $richMessage,
        ?array $data = null,
    ): SendRichMessageMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->richMessage = $richMessage;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
