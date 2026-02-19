<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\UnpinAllChatMessagesMethod;
use TgBotApi\BotApiBase\Method\UnpinChatMessageMethod;

/**
 * Trait UbpinMethodTrait.
 */
trait UnpinMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function unpin(UnpinMethodAliasInterface $unpinMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function unpinChatMessage(UnpinChatMessageMethod $unpinChatMessageMethod): bool
    {
        return $this->unpin(unpinMethodAlias: $unpinChatMessageMethod);
    }

    /**
     * @throws ResponseException
     */
    public function unpinAllChatMessages(UnpinAllChatMessagesMethod $unpinAllChatMessagesMethod): bool
    {
        return $this->unpin(unpinMethodAlias: $unpinAllChatMessagesMethod);
    }
}
