<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class PollOptionType
 * This object contains information about one answer option in a poll.
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOptionType
{
    /**
     * Option text, 1-100 characters.
     *
     * @var string
     */
    public $text;

    /**
     * Number of users that voted for this option;.
     *
     * @var int
     */
    public $voterCount;

    /**
     * Unique identifier of the option, persistent on option addition and deletion.
     *
     * @var string|null
     */
    public $persistentId;

    /**
     * Optional. Point in time (Unix timestamp) when the option was added; omitted if the option existed in the
     * original poll.
     *
     * @var \DateTimeImmutable|null
     */
    public $additionDate;
}
