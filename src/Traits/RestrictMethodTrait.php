<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;

/**
 * Trait RestrictMethodTrait.
 */
trait RestrictMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function restrict(RestrictMethodAliasInterface $restrictMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function restrictChatMember(RestrictChatMemberMethod $restrictChatMemberMethod): bool
    {
        return $this->restrict(restrictMethodAlias: $restrictChatMemberMethod);
    }
}
