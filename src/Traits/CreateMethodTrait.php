<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CreateChatInviteLinkMethod;
use TgBotApi\BotApiBase\Method\CreateNewStickerSetMethod;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Type\ChatInviteLinkType;

/**
 * Trait CreateMethodTrait.
 */
trait CreateMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function create(CreateMethodAliasInterface $createMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function createNewStickerSet(CreateNewStickerSetMethod $createNewStickerSetMethod): bool
    {
        return $this->create(createMethodAlias: $createNewStickerSetMethod);
    }

    /**
     * @throws ResponseException
     */
    public function createChatInviteLink(CreateChatInviteLinkMethod $createChatInviteLinkMethod): ChatInviteLinkType
    {
        return $this->call(method: $createChatInviteLinkMethod, type: ChatInviteLinkType::class);
    }
}
