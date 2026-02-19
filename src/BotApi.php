<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CloseMethod;
use TgBotApi\BotApiBase\Method\CopyMessageMethod;
use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\LogOutMethod;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\StopPollMethod;
use TgBotApi\BotApiBase\Traits\AliasMethodTrait;
use TgBotApi\BotApiBase\Traits\GetMethodTrait;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageIdType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\PollType;

/**
 * Class BotApi.
 */
class BotApi implements BotApiInterface
{
    use AliasMethodTrait;
    use GetMethodTrait;

    public function __construct(
        private string $botKey,
        private ApiClientInterface $apiClient,
        private NormalizerInterface $normalizer,
        private string $endPoint = 'https://api.telegram.org'
    ) {
        $this->apiClient->setBotKey(botKey: $this->botKey);
        $this->apiClient->setEndpoint(endPoint: $this->endPoint);
    }

    /**
     * @param $method
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    public function call(MethodInterface $method, string $type = null)
    {
        $json = $this->apiClient->send(method: $this->getMethodName(method: $method), botApiRequest: $this->normalizer->normalize(method: $method));

        if (true !== $json->ok) {
            throw new ResponseException(message: $json->description);
        }

        return $type ? $this->normalizer->denormalize(data: $json->result, type: $type) : $json->result;
    }

    /**
     * @throws ResponseException
     */
    public function exportChatInviteLink(ExportChatInviteLinkMethod $exportChatInviteLinkMethod): string
    {
        return $this->call(method: $exportChatInviteLinkMethod);
    }

    /**
     * @throws ResponseException
     */
    public function sendChatAction(SendChatActionMethod $sendChatActionMethod): bool
    {
        return $this->call(method: $sendChatActionMethod);
    }

    /**
     * @throws ResponseException
     *
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $sendMediaGroupMethod): array
    {
        return $this->call(method: $sendMediaGroupMethod, type: MessageType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function logOut(LogOutMethod $logOutMethod): bool
    {
        return $this->call(method: $logOutMethod);
    }

    /**
     * @throws ResponseException
     */
    public function close(CloseMethod $closeMethod): bool
    {
        return $this->call(method: $closeMethod);
    }

    /**
     * @throws ResponseException
     */
    public function copyMessage(CopyMessageMethod $copyMessageMethod): MessageIdType
    {
        return $this->call(method: $copyMessageMethod, type: MessageIdType::class);
    }

    /**
     * @throws ResponseException
     */
    public function stopPoll(StopPollMethod $stopPollMethod): PollType
    {
        return $this->call(method: $stopPollMethod, type: PollType::class);
    }

    public function getAbsoluteFilePath(FileType $fileType): string
    {
        return \sprintf(
            '%s/file/bot%s/%s',
            $this->endPoint,
            $this->botKey,
            $fileType->filePath
        );
    }

    /**
     * @param $method
     */
    private function getMethodName(MethodInterface $method): string
    {
        return \lcfirst(
            string: \substr(
            string: $method::class,
            offset: \strrpos(haystack: $method::class, needle: '\\') + 1,
            length: -6
        ));
    }
}
