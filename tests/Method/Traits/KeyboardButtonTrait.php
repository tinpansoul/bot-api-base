<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\KeyboardButtonType;

trait KeyboardButtonTrait
{
    /**
     * @return array<string, string|bool>
     */
    protected static function buildReplyKeyboardButtonArray(): array
    {
        return [
            'text' => 'text',
            'request_contact' => true,
            'request_location' => true,
        ];
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    protected static function buildReplyKeyboardButtonObject(): KeyboardButtonType
    {
        return KeyboardButtonType::create(text: 'text', data: [
            'requestContact' => true,
            'requestLocation' => true,
        ]);
    }
}
