<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\PinChatMessageMethod;

/**
 * Trait PinMethodTrait.
 */
trait PinMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function pin(PinMethodAliasInterface $pinMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function pinChatMessage(PinChatMessageMethod $pinChatMessageMethod): bool
    {
        return $this->pin(pinMethodAlias: $pinChatMessageMethod);
    }
}
