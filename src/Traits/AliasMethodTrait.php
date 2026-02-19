<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait AliasMethodTrait.
 */
trait AliasMethodTrait
{
    /**
     * @param string|null     $type
     *
     * @throws ResponseException
     * @return mixed
     */
    abstract public function call(MethodInterface $method, string $type = null);

    /**
     *
     * @throws ResponseException
     *
     */
    public function add(AddMethodAliasInterface $addMethodAlias): bool
    {
        return $this->call(method: $addMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function answer(AnswerMethodAliasInterface $answerMethodAlias): bool
    {
        return $this->call(method: $answerMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function create(CreateMethodAliasInterface $createMethodAlias): bool
    {
        return $this->call(method: $createMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function delete(DeleteMethodAliasInterface $deleteMethodAlias): bool
    {
        return $this->call(method: $deleteMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     * @return MessageType | bool
     */
    public function edit(EditMethodAliasInterface $editMethodAlias)
    {
        return $this->call(method: $editMethodAlias, type: MessageType::class . '|bool');
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function forward(ForwardMethodAliasInterface $forwardMethodAlias): MessageType
    {
        return $this->call(method: $forwardMethodAlias, type: MessageType::class);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function kick(KickMethodAliasInterface $kickMethodAlias): bool
    {
        return $this->call(method: $kickMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function leave(LeaveMethodAliasInterface $leaveMethodAlias): bool
    {
        return $this->call(method: $leaveMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function pin(PinMethodAliasInterface $pinMethodAlias): bool
    {
        return $this->call(method: $pinMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function promote(PromoteMethodAliasInterface $promoteMethodAlias): bool
    {
        return $this->call(method: $promoteMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function restrict(RestrictMethodAliasInterface $restrictMethodAlias): bool
    {
        return $this->call(method: $restrictMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function send(SendMethodAliasInterface $sendMethodAlias): MessageType
    {
        return $this->call(method: $sendMethodAlias, type: MessageType::class);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function set(SetMethodAliasInterface $setMethodAlias): bool
    {
        return $this->call(method: $setMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function stop(StopMethodAliasInterface $stopMethodAlias): bool
    {
        return $this->call(method: $stopMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function unban(UnbanMethodAliasInterface $unbanMethodAlias): bool
    {
        return $this->call(method: $unbanMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function unpin(UnpinMethodAliasInterface $unpinMethodAlias): bool
    {
        return $this->call(method: $unpinMethodAlias);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function upload(UploadMethodAliasInterface $uploadMethodAlias): FileType
    {
        return $this->call(method: $uploadMethodAlias, type: FileType::class);
    }
}
