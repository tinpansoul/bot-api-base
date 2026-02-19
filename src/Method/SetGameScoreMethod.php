<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class SetGameScoreMetod.
 *
 * @see https://core.telegram.org/bots/api#setgamescore
 */
class SetGameScoreMethod implements SetMethodAliasInterface
{
    use FillFromArrayTrait;

    /**
     * User identifier.
     *
     * @var int
     */
    public $userId;

    /**
     * New score, must be non-negative.
     *
     * @var int
     */
    public $score;

    /**
     * Optional. Pass True, if the high score is allowed to decrease.
     * This can be useful when fixing mistakes or banning cheaters.
     *
     * @var bool|null
     */
    public $force;

    /**
     * Optional. Pass True, if the game message should not be automatically edited to include the current scoreboard.
     *
     * @var bool|null
     */
    public $disableEditMessage;

    /**
     * Optional. Required if inline_message_id is not specified. Identifier of the sent message.
     *
     * @var int|null
     */
    public $chatId;

    /**
     * Optional. Required if inline_message_id is not specified. Identifier of the sent message.
     *
     * @var int|null
     */
    public $messageId;

    /**
     * Optional. Required if chat_id and message_id are not specified. Identifier of the inline message.
     *
     * @var string|null
     */
    public $inlineMessageId;

    /**
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(
        int $userId,
        int $score,
        int $chatId,
        int $messageId,
        array $data = null
    ): SetGameScoreMethod {
        $static = new static();
        $static->userId = $userId;
        $static->score = $score;
        $static->chatId = $chatId;
        $static->messageId = $messageId;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }

    /**
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function createInline(
        int $userId,
        int $score,
        string $inlineMessageId,
        array $data = null
    ): SetGameScoreMethod {
        $static = new static();
        $static->userId = $userId;
        $static->score = $score;
        $static->inlineMessageId = $inlineMessageId;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
