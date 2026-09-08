<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\VerifyMethodAliasInterface;
use TgBotApi\BotApiBase\Method\VerifyChatMethod;
use TgBotApi\BotApiBase\Method\VerifyUserMethod;

trait VerifyMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function verify(VerifyMethodAliasInterface $verifyMethodAlias): bool;

    /**
     * @throws ResponseException
     */
    public function verifyChat(VerifyChatMethod $verifyChatMethod): bool
    {
        return $this->verify(verifyMethodAlias: $verifyChatMethod);
    }

    /**
     * @throws ResponseException
     */
    public function verifyUser(VerifyUserMethod $verifyUserMethod): bool
    {
        return $this->verify(verifyMethodAlias: $verifyUserMethod);
    }
}
