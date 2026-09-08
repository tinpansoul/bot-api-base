<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Exception;

/**
 * Class InvalidResponseException.
 *
 * Thrown when the Bot API response body is not a JSON object at all - a proxy error page,
 * a truncated body, or a gateway timeout. Extends ResponseException so that existing
 * catch blocks keep working.
 */
class InvalidResponseException extends ResponseException
{
}
