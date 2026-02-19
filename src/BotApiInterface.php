<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMembersCountMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetGameHighScoresMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetStickerSetMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\GameHighScoreType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\StickerSetType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;
use TgBotApi\BotApiBase\Type\WebhookInfoType;

/**
 * Interface BotApiInterface.
 */
interface BotApiInterface extends BotApiAliasInterface
{
    /**
     * @param string|null     $type
     *
     * @throws ResponseException
     * @return mixed
     */
    public function call(MethodInterface $method, string $type = null);

    /**
     *
     * @throws ResponseException
     *
     */
    public function exportChatInviteLink(ExportChatInviteLinkMethod $exportChatInviteLinkMethod): string;

    /**
     *
     * @throws ResponseException
     *
     */
    public function sendChatAction(SendChatActionMethod $sendChatActionMethod): bool;

    /**
     *
     * @throws ResponseException
     * @return UpdateType[]
     */
    public function getUpdates(GetUpdatesMethod $getUpdatesMethod): array;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getMe(GetMeMethod $getMeMethod): UserType;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $getUserProfilePhotosMethod): UserProfilePhotosType;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getWebhookInfo(GetWebhookInfoMethod $getWebhookInfoMethod): WebhookInfoType;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getChatMembersCount(GetChatMembersCountMethod $getChatMembersCountMethod): int;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getChat(GetChatMethod $getChatMethod): ChatType;

    /**
     *
     * @throws ResponseException
     * @return ChatMemberType[]
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $getChatAdministratorsMethod): array;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getChatMember(GetChatMemberMethod $getChatMemberMethod): ChatMemberType;

    /**
     *
     * @throws ResponseException
     * @return GameHighScoreType[]
     */
    public function getGameHighScores(GetGameHighScoresMethod $getGameHighScoresMethod): array;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getStickerSet(GetStickerSetMethod $getStickerSetMethod): StickerSetType;

    /**
     *
     * @throws ResponseException
     *
     */
    public function getFile(GetFileMethod $getFileMethod): FileType;

    /**
     *
     * @throws ResponseException
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $sendMediaGroupMethod): array;

    public function getAbsoluteFilePath(FileType $fileType): string;
}
