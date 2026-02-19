<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Exception\BadArgumentException;

/**
 * Class MenuButtonType.
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfoType
{
    /**
     * An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     *
     * @var string
     */
    public $url;

    /**
     *
     * @throws BadArgumentException
     *
     */
    public static function create(string $url): WebAppInfoType
    {
        $static = new static();
        $static->url = $url;

        return $static;
    }
}
