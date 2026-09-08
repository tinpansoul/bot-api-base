<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CopyMessagesMethod;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Method\ForwardMessagesMethod;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Type\MessageIdType;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait ForwardMethodTrait.
 */
trait ForwardMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function forward(ForwardMethodAliasInterface $forwardMethodAlias): MessageType;

    /**
     * @throws ResponseException
     */
    public function forwardMessage(ForwardMessageMethod $forwardMessageMethod): MessageType
    {
        return $this->forward(forwardMethodAlias: $forwardMessageMethod);
    }

    /**
     * @throws ResponseException
     *
     * @return MessageIdType[]
     */
    public function copyMessages(CopyMessagesMethod $copyMessagesMethod): array
    {
        return $this->call(method: $copyMessagesMethod, type: MessageIdType::class . '[]');
    }

    /**
     * @throws ResponseException
     *
     * @return MessageIdType[]
     */
    public function forwardMessages(ForwardMessagesMethod $forwardMessagesMethod): array
    {
        return $this->call(method: $forwardMessagesMethod, type: MessageIdType::class . '[]');
    }
}
