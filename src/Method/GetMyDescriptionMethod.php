<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetMyDescriptionMethod.
 *
 * Use this method to get the current bot description for the given user language.
 *
 * @see https://core.telegram.org/bots/api#getmydescription
 */
class GetMyDescriptionMethod implements MethodInterface
{
    /**
     * Optional. A two-letter ISO 639-1 language code or an empty string.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?string $languageCode = null): GetMyDescriptionMethod
    {
        $static = new static();
        $static->languageCode = $languageCode;

        return $static;
    }
}
