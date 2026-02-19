<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

trait InlineKeyboardMarkupTrait
{
    use InlineButtonTrait;

    /**
     * @return array<string, array<int, array<int, mixed[]>>>
     */
    public static function buildInlineMarkupArray(): array
    {
        return ['inline_keyboard' => [[
            static::buildInlineKeyboardButtonArray(),
            static::buildInlineKeyboardButtonArray(),
        ]]];
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function buildInlineMarkupObject(): InlineKeyboardMarkupType
    {
        return InlineKeyboardMarkupType::create(inlineKeyboard: [[
            static::buildInlineKeyboardButtonObject(),
            static::buildInlineKeyboardButtonObject(),
        ]]);
    }
}
