<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetMyNameMethod.
 *
 * Use this method to get the current bot name for the given user language.
 *
 * @see https://core.telegram.org/bots/api#getmyname
 */
class GetMyNameMethod implements MethodInterface
{
    /**
     * Optional. A two-letter ISO 639-1 language code or an empty string.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?string $languageCode = null): GetMyNameMethod
    {
        $static = new static();
        $static->languageCode = $languageCode;

        return $static;
    }
}
