<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AddStickerToSetMethod;
use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;

/**
 * Trait AddMethodTrait.
 */
trait AddMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function add(AddMethodAliasInterface $addMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function addStickerToSet(AddStickerToSetMethod $addStickerToSetMethod): bool
    {
        return $this->add(addMethodAlias: $addStickerToSetMethod);
    }
}
