<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\DeleteChatPhotoMethod;
use TgBotApi\BotApiBase\Method\DeleteChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\DeleteMessageMethod;
use TgBotApi\BotApiBase\Method\DeleteStickerFromSetMethod;
use TgBotApi\BotApiBase\Method\DeleteWebhookMethod;
use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;

/**
 * Trait DeleteMethodTrait.
 */
trait DeleteMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function delete(DeleteMethodAliasInterface $deleteMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function deleteChatPhoto(DeleteChatPhotoMethod $deleteChatPhotoMethod): bool
    {
        return $this->delete(deleteMethodAlias: $deleteChatPhotoMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function deleteChatStickerSet(DeleteChatStickerSetMethod $deleteChatStickerSetMethod): bool
    {
        return $this->delete(deleteMethodAlias: $deleteChatStickerSetMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function deleteMessage(DeleteMessageMethod $deleteMessageMethod): bool
    {
        return $this->delete(deleteMethodAlias: $deleteMessageMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function deleteStickerFromSet(DeleteStickerFromSetMethod $deleteStickerFromSetMethod): bool
    {
        return $this->delete(deleteMethodAlias: $deleteStickerFromSetMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function deleteWebhook(DeleteWebhookMethod $deleteWebhookMethod): bool
    {
        return $this->delete(deleteMethodAlias: $deleteWebhookMethod);
    }
}
