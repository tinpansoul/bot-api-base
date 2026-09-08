<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetMyShortDescriptionMethod.
 *
 * Use this method to get the current bot short description for the given user language.
 *
 * @see https://core.telegram.org/bots/api#getmyshortdescription
 */
class GetMyShortDescriptionMethod implements MethodInterface
{
    /**
     * Optional. A two-letter ISO 639-1 language code or an empty string.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?string $languageCode = null): GetMyShortDescriptionMethod
    {
        $static = new static();
        $static->languageCode = $languageCode;

        return $static;
    }
}
