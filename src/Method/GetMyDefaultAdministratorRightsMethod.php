<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetMyDefaultAdministratorRightsMethod.
 *
 * Use this method to get the current default administrator rights of the bot.
 *
 * @see https://core.telegram.org/bots/api#getmydefaultadministratorrights
 */
class GetMyDefaultAdministratorRightsMethod implements MethodInterface
{
    /**
     * Optional. Pass True to get the default administrator rights of the bot in channels. Otherwise, the default
     * administrator rights of the bot for groups and supergroups will be returned.
     *
     * @var bool|null
     */
    public $forChannels;

    public static function create(?bool $forChannels = null): GetMyDefaultAdministratorRightsMethod
    {
        $static = new static();
        $static->forChannels = $forChannels;

        return $static;
    }
}
