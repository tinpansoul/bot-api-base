<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class InlineQueryType.
 *
 * @see https://core.telegram.org/bots/api#inline-mode
 */
class InlineQueryType
{
    /**
     * Unique identifier for this query.
     *
     * @var string
     */
    public $id;

    /**
     * Sender.
     *
     * @var UserType
     */
    public $from;

    /**
     * Optional. Sender location, only for bots that request user location.
     *
     * @var LocationType|null
     */
    public $location;

    /**
     * Text of the query (up to 512 characters).
     *
     * @var string
     */
    public $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot.
     *
     * @var string
     */
    public $offset;

    /**
     * Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat
     * with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type
     * should be always known for requests sent from official clients and most third-party clients, unless the request
     * was sent from a secret chat.
     *
     * @var string|null
     */
    public $chatType;
}
