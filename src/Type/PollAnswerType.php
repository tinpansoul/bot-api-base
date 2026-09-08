<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswerType
{
    /**
     * Unique poll identifier.
     *
     * @var string
     */
    public $pollId;

    /**
     * The user, who changed the answer to the poll.
     *
     * @var UserType
     */
    public $user;

    /**
     * 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
     *
     * @var int[]
     */
    public $optionIds;

    /**
     * Persistent identifiers of the chosen answer options. May be empty if the vote was retracted.
     *
     * @var string[]|null
     */
    public $optionPersistentIds;

    /**
     * Optional. The chat that changed the answer to the poll, if the voter is anonymous.
     *
     * @var ChatType|null
     */
    public $voterChat;
}
