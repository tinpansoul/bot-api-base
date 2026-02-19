<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\EditMessageCaptionMethod;
use TgBotApi\BotApiBase\Method\EditMessageLiveLocationMethod;
use TgBotApi\BotApiBase\Method\EditMessageMediaMethod;
use TgBotApi\BotApiBase\Method\EditMessageReplyMarkupMethod;
use TgBotApi\BotApiBase\Method\EditMessageTextMethod;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait EditMethodTrait.
 */
trait EditMethodTrait
{
    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    abstract public function edit(EditMethodAliasInterface $editMethodAlias);

    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    public function editMessageCaption(EditMessageCaptionMethod $editMessageCaptionMethod)
    {
        return $this->edit(editMethodAlias: $editMessageCaptionMethod);
    }

    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    public function editMessageLiveLocation(EditMessageLiveLocationMethod $editMessageLiveLocationMethod)
    {
        return $this->edit(editMethodAlias: $editMessageLiveLocationMethod);
    }

    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    public function editMessageMedia(EditMessageMediaMethod $editMessageMediaMethod)
    {
        return $this->edit(editMethodAlias: $editMessageMediaMethod);
    }

    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    public function editMessageReplyMarkup(EditMessageReplyMarkupMethod $editMessageReplyMarkupMethod)
    {
        return $this->edit(editMethodAlias: $editMessageReplyMarkupMethod);
    }

    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    public function editMessageText(EditMessageTextMethod $editMessageTextMethod)
    {
        return $this->edit(editMethodAlias: $editMessageTextMethod);
    }
}
