<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ReplyParametersType.
 *
 * Describes reply parameters for the message that is being sent.
 * Replaces the deprecated reply_to_message_id and allow_sending_without_reply fields.
 *
 * @see https://core.telegram.org/bots/api#replyparameters
 */
class ReplyParametersType
{
    /**
     * Optional. Identifier of the message that will be replied to in the current chat,
     * or in the chat chat_id if it is specified. Required if ephemeral_message_id isn't specified.
     *
     * @var int|null
     */
    public $messageId;

    /**
     * Optional. If the message to be replied to is from a different chat, unique identifier for the chat
     * or username of the bot, supergroup or channel in the format @username.
     *
     * @var int|string|null
     */
    public $chatId;

    /**
     * Optional. Identifier of the incoming ephemeral message that will be replied to in the current chat.
     * Required if message_id isn't specified.
     *
     * @var int|null
     */
    public $ephemeralMessageId;

    /**
     * Optional. Pass True if the message should be sent even if the specified message to be replied to is not found.
     *
     * @var bool|null
     */
    public $allowSendingWithoutReply;

    /**
     * Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing.
     * The quote must be an exact substring of the message to be replied to.
     *
     * @var string|null
     */
    public $quote;

    /**
     * Optional. Mode for parsing entities in the quote.
     *
     * @var string|null
     */
    public $quoteParseMode;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the quote.
     * It can be specified instead of quote_parse_mode.
     *
     * @var MessageEntityType[]|null
     */
    public $quoteEntities;

    /**
     * Optional. Position of the quote in the original message in UTF-16 code units.
     *
     * @var int|null
     */
    public $quotePosition;

    /**
     * Optional. Identifier of the specific checklist task to be replied to.
     *
     * @var int|null
     */
    public $checklistTaskId;

    /**
     * Optional. Persistent identifier of the specific poll option to be replied to.
     *
     * @var string|null
     */
    public $pollOptionId;

    public static function create(?int $messageId = null): ReplyParametersType
    {
        $static = new static();
        $static->messageId = $messageId;

        return $static;
    }
}
