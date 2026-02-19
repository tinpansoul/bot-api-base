<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\StopMessageLiveLocationMethod;

/**
 * Trait StopMethodTrait.
 */
trait StopMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function stop(StopMethodAliasInterface $stopMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function stopMessageLiveLocation(StopMessageLiveLocationMethod $stopMessageLiveLocationMethod): bool
    {
        return $this->stop(stopMethodAlias: $stopMessageLiveLocationMethod);
    }
}
