<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Class BotApiRequest.
 */
class BotApiRequest implements BotApiRequestInterface
{

    /**
     * BotApiRequest constructor.
     */
    public function __construct(private readonly array $data, private readonly array $files)
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getFiles(): array
    {
        return $this->files;
    }
}
