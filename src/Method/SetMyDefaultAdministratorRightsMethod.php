<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Type\ChatAdministratorRightsType;

/**
 * Class SetMyDefaultAdministratorRightsMethod.
 *
 * Use this method to change the default administrator rights requested by the bot when it is added as an
 * administrator to groups or channels. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmydefaultadministratorrights
 */
class SetMyDefaultAdministratorRightsMethod implements SetMethodAliasInterface
{
    /**
     * Optional. The new default administrator rights. If not specified, the default administrator rights will be
     * cleared.
     *
     * @var ChatAdministratorRightsType|null
     */
    public $rights;

    /**
     * Optional. Pass True to change the default administrator rights of the bot in channels. Otherwise, the
     * default administrator rights of the bot for groups and supergroups will be changed.
     *
     * @var bool|null
     */
    public $forChannels;

    public static function create(?ChatAdministratorRightsType $rights = null, ?bool $forChannels = null): SetMyDefaultAdministratorRightsMethod
    {
        $static = new static();
        $static->rights = $rights;
        $static->forChannels = $forChannels;

        return $static;
    }
}
