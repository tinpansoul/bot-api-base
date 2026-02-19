<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Type\ChatPermissionsType;

/**
 * Class SetChatPermissionsMethod.
 *
 * Use this method to set default chat permissions for all members.
 * The bot must be an administrator in the group or a supergroup
 * for this to work and must have the can_restrict_members admin rights. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setchatpermissions
 */
class SetChatPermissionsMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * @var ChatPermissionsType
     */
    public $permissions;

    public static function create(int|string $chatId, ChatPermissionsType $chatPermissionsType): SetChatPermissionsMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->permissions = $chatPermissionsType;

        return $static;
    }
}
