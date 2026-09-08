<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class CopyMessagesMethod.
 *
 * Use this method to copyMessages messages of any kind. Album grouping is kept for copied messages.
 * On success, an array of MessageId of the sent messages is returned.
 *
 * @see https://core.telegram.org/bots/api#copyMessages
 */
class CopyMessagesMethod implements ForwardMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;

    /**
     * Unique identifier for the chat where the original messages were sent.
     *
     * @var int|string
     */
    public $fromChatId;

    /**
     * A list of 1-100 identifiers of messages in the chat fromChatId to copyMessages.
     * The identifiers must be specified in a strictly increasing order.
     *
     * @var int[]
     */
    public $messageIds;

    /**
     * Optional. Unique identifier for the target message thread of a forum supergroup.
     *
     * @var int|null
     */
    public $messageThreadId;

    /**
     * Optional. Sends the messages silently. Users will receive a notification with no sound.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * Optional. Protects the contents of the sent messages from forwarding and saving.
     *
     * @var bool|null
     */
    public $protectContent;

    /**
     * Optional. Pass True to copy the messages without their captions.
     *
     * @var bool|null
     */
    public $removeCaption;

    /**
     * @param int[] $messageIds
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds,
        ?array $data = null,
    ): CopyMessagesMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->fromChatId = $fromChatId;
        $static->messageIds = $messageIds;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
