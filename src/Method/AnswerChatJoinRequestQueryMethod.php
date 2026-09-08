<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;

/**
 * Class AnswerChatJoinRequestQueryMethod.
 *
 * Use this method to send an answer to a chat join request query. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#answerchatjoinrequestquery
 */
class AnswerChatJoinRequestQueryMethod implements AnswerMethodAliasInterface
{
    /**
     * Unique identifier for the query to be answered.
     *
     * @var string
     */
    public $chatJoinRequestQueryId;

    /**
     * Result of the query; one of "approve", "decline" or "web_app".
     *
     * @var string
     */
    public $result;

    public static function create(string $chatJoinRequestQueryId, string $result): AnswerChatJoinRequestQueryMethod
    {
        $static = new static();
        $static->chatJoinRequestQueryId = $chatJoinRequestQueryId;
        $static->result = $result;

        return $static;
    }
}
