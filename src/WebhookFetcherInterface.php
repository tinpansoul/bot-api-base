<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Psr\Http\Message\RequestInterface;
use TgBotApi\BotApiBase\Exception\BadRequestException;
use TgBotApi\BotApiBase\Type\UpdateType;

/**
 * Interface WebhookFetcherInterface.
 */
interface WebhookFetcherInterface
{
    /**
     * @param RequestInterface|string
     *
     * @throws BadRequestException
     */
    public function fetch(mixed $request): UpdateType;
}
