<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CreateNewStickerSetMethod;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;

/**
 * Trait CreateMethodTrait.
 */
trait CreateMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function create(CreateMethodAliasInterface $createMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function createNewStickerSet(CreateNewStickerSetMethod $createNewStickerSetMethod): bool
    {
        return $this->create(createMethodAlias: $createNewStickerSetMethod);
    }
}
