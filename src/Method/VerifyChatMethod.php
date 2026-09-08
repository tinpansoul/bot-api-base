<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\VerifyMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class VerifyChatMethod.
 *
 * Use this method to verify a chat on behalf of the organization which is represented by the bot. Returns True
 * on success.
 *
 * @see https://core.telegram.org/bots/api#verifychat
 */
class VerifyChatMethod implements VerifyMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * Optional. Custom description for the verification; 0-70 characters. Must be empty if the organization isn't
     * allowed to provide a custom verification description.
     *
     * @var string|null
     */
    public $customDescription;

    public static function create(int|string $chatId, ?string $customDescription = null): VerifyChatMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->customDescription = $customDescription;

        return $static;
    }
}
