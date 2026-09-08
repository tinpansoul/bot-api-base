<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Exception;

/**
 * Class ResponseException.
 *
 * Thrown when the Bot API answers with "ok": false.
 *
 * The exception code carries Telegram's "error_code" field, and the optional "parameters"
 * object of type ResponseParameters is exposed through getRetryAfter() and getMigrateToChatId().
 *
 * @see https://core.telegram.org/bots/api#making-requests
 * @see https://core.telegram.org/bots/api#responseparameters
 */
class ResponseException extends \Exception
{
    public function __construct(
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        private readonly ?int $retryAfter = null,
        private readonly ?int $migrateToChatId = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * In case of exceeding flood control, the number of seconds left to wait
     * before the request can be repeated.
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }

    /**
     * The group has been migrated to a supergroup with the specified identifier.
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }
}
