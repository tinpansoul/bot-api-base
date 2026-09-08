<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Type\BotCommandScopeType;

/**
 * Class DeleteMyCommandsMethod.
 *
 * Use this method to delete the list of the bot's commands for the given scope and user language. After
 * deletion, higher level commands will be shown to affected users. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#deletemycommands
 */
class DeleteMyCommandsMethod implements DeleteMethodAliasInterface
{
    /**
     * Optional. An object describing the scope of users for which the commands are relevant. Defaults to
     * BotCommandScopeType::TYPE_DEFAULT.
     *
     * @var BotCommandScopeType|null
     */
    public $scope;

    /**
     * Optional. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the
     * given scope for whose language there are no dedicated commands.
     *
     * @var string|null
     */
    public $languageCode;

    public static function create(?BotCommandScopeType $scope = null, ?string $languageCode = null): DeleteMyCommandsMethod
    {
        $static = new static();
        $static->scope = $scope;
        $static->languageCode = $languageCode;

        return $static;
    }
}
