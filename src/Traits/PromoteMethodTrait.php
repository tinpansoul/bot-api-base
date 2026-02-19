<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\PromoteChatMemberMethod;

/**
 * Trait PromoteMethodTrait.
 */
trait PromoteMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function promote(PromoteMethodAliasInterface $promoteMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function promoteChatMember(PromoteChatMemberMethod $promoteChatMemberMethod): bool
    {
        return $this->promote(promoteMethodAlias: $promoteChatMemberMethod);
    }
}
