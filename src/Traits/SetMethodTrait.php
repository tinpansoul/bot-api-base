<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\SetChatAdministratorCustomTitleMethod;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;
use TgBotApi\BotApiBase\Method\SetChatPermissionsMethod;
use TgBotApi\BotApiBase\Method\SetChatPhotoMethod;
use TgBotApi\BotApiBase\Method\SetChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\SetChatTitleMethod;
use TgBotApi\BotApiBase\Method\SetGameScoreMethod;
use TgBotApi\BotApiBase\Method\SetMyCommandsMethod;
use TgBotApi\BotApiBase\Method\SetPassportDataErrorsMethod;
use TgBotApi\BotApiBase\Method\SetStickerPositionInSetMethod;
use TgBotApi\BotApiBase\Method\SetStickerSetThumbMethod;
use TgBotApi\BotApiBase\Method\SetWebhookMethod;

/**
 * Trait SetMethodTrait.
 */
trait SetMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function set(SetMethodAliasInterface $setMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function setChatDescription(SetChatDescriptionMethod $setChatDescriptionMethod): bool
    {
        return $this->set(setMethodAlias: $setChatDescriptionMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setChatPhoto(SetChatPhotoMethod $setChatPhotoMethod): bool
    {
        return $this->set(setMethodAlias: $setChatPhotoMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setChatAdministratorCustomTitle(SetChatAdministratorCustomTitleMethod $setChatAdministratorCustomTitleMethod): bool
    {
        return $this->set(setMethodAlias: $setChatAdministratorCustomTitleMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setChatStickerSet(SetChatStickerSetMethod $setChatStickerSetMethod): bool
    {
        return $this->set(setMethodAlias: $setChatStickerSetMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setChatTitle(SetChatTitleMethod $setChatTitleMethod): bool
    {
        return $this->set(setMethodAlias: $setChatTitleMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setMyCommands(SetMyCommandsMethod $setMyCommandsMethod): bool
    {
        return $this->set(setMethodAlias: $setMyCommandsMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setGameScore(SetGameScoreMethod $setGameScoreMethod): bool
    {
        return $this->set(setMethodAlias: $setGameScoreMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setStickerPositionInSet(SetStickerPositionInSetMethod $setStickerPositionInSetMethod): bool
    {
        return $this->set(setMethodAlias: $setStickerPositionInSetMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setStickerSetThumb(SetStickerSetThumbMethod $setStickerSetThumbMethod): bool
    {
        return $this->set(setMethodAlias: $setStickerSetThumbMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setWebhook(SetWebhookMethod $setWebhookMethod): bool
    {
        return $this->set(setMethodAlias: $setWebhookMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setPassportDataErrors(SetPassportDataErrorsMethod $setPassportDataErrorsMethod): bool
    {
        return $this->set(setMethodAlias: $setPassportDataErrorsMethod);
    }

    /**
     * @throws ResponseException
     */
    public function setChatPermissions(SetChatPermissionsMethod $setChatPermissionsMethod): bool
    {
        return $this->set(setMethodAlias: $setChatPermissionsMethod);
    }
}
