<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMembersCountMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetChatMenuButtonMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetGameHighScoresMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetMyCommandsMethod;
use TgBotApi\BotApiBase\Method\GetStickerSetMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Type\BotCommandType;
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\GameHighScoreType;
use TgBotApi\BotApiBase\Type\MenuButtonType;
use TgBotApi\BotApiBase\Type\StickerSetType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;
use TgBotApi\BotApiBase\Type\WebhookInfoType;

trait GetMethodTrait
{
    /**
     * @param $type
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    abstract public function call(MethodInterface $method, string $type = null);

    /**
     * @throws ResponseException
     *
     * @return UpdateType[]
     */
    public function getUpdates(GetUpdatesMethod $getUpdatesMethod): array
    {
        return $this->call(method: $getUpdatesMethod, type: UpdateType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getMe(GetMeMethod $getMeMethod): UserType
    {
        return $this->call(method: $getMeMethod, type: UserType::class);
    }

    /**
     * @throws ResponseException
     *
     * @return BotCommandType[]
     */
    public function getMyCommands(GetMyCommandsMethod $getMyCommandsMethod): array
    {
        return $this->call(method: $getMyCommandsMethod, type: BotCommandType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $getUserProfilePhotosMethod): UserProfilePhotosType
    {
        return $this->call(method: $getUserProfilePhotosMethod, type: UserProfilePhotosType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getWebhookInfo(GetWebhookInfoMethod $getWebhookInfoMethod): WebhookInfoType
    {
        return $this->call(method: $getWebhookInfoMethod, type: WebhookInfoType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getChatMembersCount(GetChatMembersCountMethod $getChatMembersCountMethod): int
    {
        return $this->call(method: $getChatMembersCountMethod);
    }

    /**
     * @throws ResponseException
     */
    public function getChat(GetChatMethod $getChatMethod): ChatType
    {
        return $this->call(method: $getChatMethod, type: ChatType::class);
    }

    /**
     * @throws ResponseException
     *
     * @return ChatMemberType[]
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $getChatAdministratorsMethod): array
    {
        return $this->call(method: $getChatAdministratorsMethod, type: ChatMemberType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getChatMember(GetChatMemberMethod $getChatMemberMethod): ChatMemberType
    {
        return $this->call(method: $getChatMemberMethod, type: ChatMemberType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getChatMenuButton(GetChatMenuButtonMethod $getChatMenuButtonMethod): MenuButtonType
    {
        return $this->call(method: $getChatMenuButtonMethod, type: MenuButtonType::class);
    }

    /**
     * @throws ResponseException
     *
     * @return GameHighScoreType[]
     */
    public function getGameHighScores(GetGameHighScoresMethod $getGameHighScoresMethod): array
    {
        return $this->call(method: $getGameHighScoresMethod, type: GameHighScoreType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getStickerSet(GetStickerSetMethod $getStickerSetMethod): StickerSetType
    {
        return $this->call(method: $getStickerSetMethod, type: StickerSetType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getFile(GetFileMethod $getFileMethod): FileType
    {
        return $this->call(method: $getFileMethod, type: FileType::class);
    }
}
