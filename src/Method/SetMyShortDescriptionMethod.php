<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;

/**
 * Class SetMyShortDescriptionMethod.
 *
 * Use this method to change the bot's short description. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmyshortdescription
 */
class SetMyShortDescriptionMethod implements SetMethodAliasInterface
{
    /**
     * Optional. New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated
     * short description for the given language.
     *
     * @var string|null
     */
    public $shortDescription;

    /**
     * Optional. A two-letter ISO 639-1 language code. If empty, the value applies to all users for whose language
     * there is no dedicated value.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?string $shortDescription = null, ?string $languageCode = null): SetMyShortDescriptionMethod
    {
        $static = new static();
        $static->shortDescription = $shortDescription;
        $static->languageCode = $languageCode;

        return $static;
    }
}
