<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;

/**
 * Class SetMyDescriptionMethod.
 *
 * Use this method to change the bot's description. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmydescription
 */
class SetMyDescriptionMethod implements SetMethodAliasInterface
{
    /**
     * Optional. New bot description; 0-512 characters. Pass an empty string to remove the dedicated description
     * for the given language.
     *
     * @var string|null
     */
    public $description;

    /**
     * Optional. A two-letter ISO 639-1 language code. If empty, the value applies to all users for whose language
     * there is no dedicated value.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?string $description = null, ?string $languageCode = null): SetMyDescriptionMethod
    {
        $static = new static();
        $static->description = $description;
        $static->languageCode = $languageCode;

        return $static;
    }
}
