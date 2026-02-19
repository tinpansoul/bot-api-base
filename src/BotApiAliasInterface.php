<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Method\CloseMethod;
use TgBotApi\BotApiBase\Method\CopyMessageMethod;
use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Method\LogOutMethod;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageIdType;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Interface BotApiAliasInterface.
 */
interface BotApiAliasInterface
{
    public function send(SendMethodAliasInterface $sendMethodAlias): MessageType;

    public function create(CreateMethodAliasInterface $createMethodAlias): bool;

    public function add(AddMethodAliasInterface $addMethodAlias): bool;

    public function answer(AnswerMethodAliasInterface $answerMethodAlias): bool;

    public function delete(DeleteMethodAliasInterface $deleteMethodAlias): bool;

    /**
     * @return MessageType | bool
     */
    public function edit(EditMethodAliasInterface $editMethodAlias);

    public function forward(ForwardMethodAliasInterface $forwardMethodAlias): MessageType;

    public function kick(KickMethodAliasInterface $kickMethodAlias): bool;

    public function leave(LeaveMethodAliasInterface $leaveMethodAlias): bool;

    public function pin(PinMethodAliasInterface $pinMethodAlias): bool;

    public function promote(PromoteMethodAliasInterface $promoteMethodAlias): bool;

    public function restrict(RestrictMethodAliasInterface $restrictMethodAlias): bool;

    public function set(SetMethodAliasInterface $setMethodAlias): bool;

    public function stop(StopMethodAliasInterface $stopMethodAlias): bool;

    public function unban(UnbanMethodAliasInterface $unbanMethodAlias): bool;

    public function unpin(UnpinMethodAliasInterface $unpinMethodAlias): bool;

    public function upload(UploadMethodAliasInterface $uploadMethodAlias): FileType;

    public function logOut(LogOutMethod $logOutMethod): bool;

    public function close(CloseMethod $closeMethod): bool;

    public function copyMessage(CopyMessageMethod $copyMessageMethod): MessageIdType;
}
