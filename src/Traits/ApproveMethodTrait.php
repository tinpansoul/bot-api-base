<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ApproveChatJoinRequestMethod;
use TgBotApi\BotApiBase\Method\Interfaces\ApproveMethodAliasInterface;

trait ApproveMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function approve(ApproveMethodAliasInterface $approveMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function approveChatJoinRequest(ApproveChatJoinRequestMethod $approveChatJoinRequestMethod): bool
    {
        return $this->approve(approveMethodAlias: $approveChatJoinRequestMethod);
    }
}
