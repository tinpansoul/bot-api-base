<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\VerifyMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class VerifyUserMethod.
 *
 * Use this method to verify a user on behalf of the organization which is represented by the bot. Returns True
 * on success.
 *
 * @see https://core.telegram.org/bots/api#verifyuser
 */
class VerifyUserMethod implements VerifyMethodAliasInterface
{
    use UserIdVariableTrait;

    /**
     * Optional. Custom description for the verification; 0-70 characters. Must be empty if the organization isn't
     * allowed to provide a custom verification description.
     *
     * @var string|null
     */
    public $customDescription;

    public static function create(int $userId, ?string $customDescription = null): VerifyUserMethod
    {
        $static = new static();
        $static->userId = $userId;
        $static->customDescription = $customDescription;

        return $static;
    }
}
