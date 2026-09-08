<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;

/**
 * Class SetMyNameMethod.
 *
 * Use this method to change the bot's name. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmyname
 */
class SetMyNameMethod implements SetMethodAliasInterface
{
    /**
     * Optional. New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given
     * language.
     *
     * @var string|null
     */
    public $name;

    /**
     * Optional. A two-letter ISO 639-1 language code. If empty, the value applies to all users for whose language
     * there is no dedicated value.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?string $name = null, ?string $languageCode = null): SetMyNameMethod
    {
        $static = new static();
        $static->name = $name;
        $static->languageCode = $languageCode;

        return $static;
    }
}
