<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;

/**
 * Class DeleteStickerFromSetMethod.
 *
 * @see https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetMethod implements DeleteMethodAliasInterface
{
    /**
     * File identifier of the sticker.
     *
     * @var string
     */
    public $sticker;

    public static function create(string $sticker): DeleteStickerFromSetMethod
    {
        $static = new static();
        $static->sticker = $sticker;

        return $static;
    }
}
