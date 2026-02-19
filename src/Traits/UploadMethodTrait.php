<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Method\UploadStickerFileMethod;
use TgBotApi\BotApiBase\Type\FileType;

/**
 * Trait UploadMethodTrait.
 */
trait UploadMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function upload(UploadMethodAliasInterface $uploadMethodAlias): FileType;

    /**
     *
     * @throws ResponseException
     *
     */
    public function uploadStickerFile(UploadStickerFileMethod $uploadStickerFileMethod): FileType
    {
        return $this->upload(uploadMethodAlias: $uploadStickerFileMethod);
    }
}
