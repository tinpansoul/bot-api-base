<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Interface ApiClientInterface.
 */
interface ApiClientInterface
{
    public function setBotKey(string $botKey): void;

    public function setEndpoint(string $endPoint): void;

    /**
     *
     * @return mixed
     */
    public function send(string $method, BotApiRequestInterface $botApiRequest);
}
