<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Interface NormalizerInterface.
 */
interface NormalizerInterface
{
    /**
     * @return object|array
     */
    public function denormalize($data, string $type);

    public function normalize($method): BotApiRequestInterface;
}
