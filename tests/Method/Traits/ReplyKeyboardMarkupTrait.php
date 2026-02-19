<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;

trait ReplyKeyboardMarkupTrait
{
    use KeyboardButtonTrait;

    /**
     * @return array<string, array<int, array<mixed[]>>|bool>
     */
    public static function buildReplyMarkupArray(): array
    {
        return [
            'keyboard' => [[
                static::buildReplyKeyboardButtonArray(),
                static::buildReplyKeyboardButtonArray(),
            ]],
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'selective' => true,
        ];
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function buildReplyMarkupObject(): ReplyKeyboardMarkupType
    {
        return ReplyKeyboardMarkupType::create(
            keyboard: [[
                static::buildReplyKeyboardButtonObject(),
                static::buildReplyKeyboardButtonObject(),
            ]],
            data: [
                'resizeKeyboard' => true,
                'oneTimeKeyboard' => true,
                'selective' => true,
            ]
        );
    }
}
