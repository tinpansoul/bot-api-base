<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Interfaces\PollTypeInterface;

/**
 * Class PollType
 * This object contains information about a poll.
 *
 * @see  https://core.telegram.org/bots/api#poll
 */
class PollType implements PollTypeInterface
{
    /**
     * Unique poll identifier.
     *
     * @var string
     */
    public $id;

    /**
     * Poll question, 1-300 characters.
     *
     * @var string
     */
    public $question;

    /**
     * List of poll options.
     *
     * @var PollOptionType[]
     */
    public $options;

    /**
     * Total number of users that voted in the poll.
     *
     * @var int
     */
    public $totalVoterCount;

    /**
     * True, if the poll is closed.
     *
     * @var bool|null
     */
    public $isClosed;

    /**
     * True, if the poll is anonymous.
     *
     * @var bool|null
     */
    public $isAnonymous;

    /**
     * Poll type, currently can be “regular” or “quiz”.
     *
     * @var string
     */
    public $type;

    /**
     * True, if the poll allows multiple answers.
     *
     * @var bool|null
     */
    public $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option.
     * Available only for polls in the quiz mode, which are closed, or was sent (not forwarded)
     * by the bot or to the private chat with the bot.
     *
     * @var int|null
     */
    public $correctOptionId;

    /**
     * Optional. Text that is shown when a user chooses an incorrect answer or taps
     * on the lamp icon in a quiz-style poll, 0-200 characters.
     *
     * @var string|null
     */
    public $explanation;

    /**
     * Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation.
     *
     * @var MessageEntityType|null
     */
    public $explanationEntities;

    /**
     * Optional. Amount of time in seconds the poll will be active after creation.
     *
     * @var int|null
     */
    public $openPeriod;

    /**
     * Optional. Point in time (Unix timestamp) when the poll will be automatically closed.
     *
     * @var \DateTimeInterface|null
     */
    public $closeDate;

    /**
     * True, if the poll allows to change the chosen answer options.
     *
     * @var bool|null
     */
    public $allowsRevoting;

    /**
     * True if voting is limited to users who have been members of the chat where the poll was originally sent for more
     * than 24 hours.
     *
     * @var bool|null
     */
    public $membersOnly;

    /**
     * Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which users can
     * vote in the poll. The country code “FT” is used for users with anonymous numbers. If omitted, then users
     * from any country can participate in the poll.
     *
     * @var string[]|null
     */
    public $countryCodes;

    /**
     * Optional. Array of 0-based identifiers of the correct answer options. Available only for polls in quiz mode
     * which are closed or were sent (not forwarded) by the bot or to the private chat with the bot.
     *
     * @var int[]|null
     */
    public $correctOptionIds;

    /**
     * Optional. Description of the poll; for polls inside the Message object only.
     *
     * @var string|null
     */
    public $description;
}
