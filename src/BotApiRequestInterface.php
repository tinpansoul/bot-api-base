<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Interface BotApiRequestInterface.
 */
interface BotApiRequestInterface
{
    public function getData(): array;

    public function getFiles(): array;
}
