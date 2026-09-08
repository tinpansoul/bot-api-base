<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class BotCommandType.
 *
 * This object represents a bot command.
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommandType
{
    /**
     * Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     *
     * @var string
     */
    public $command;

    /**
     * Description of the command, 3-256 characters.
     *
     * @var string
     */
    public $description;

    /**
     * Optional. True, if the command sends an ephemeral message, which can be seen only by the sender of the message
     * and the bot.
     *
     * @var bool|null
     */
    public $isEphemeral;

    public static function create(string $command, string $description): BotCommandType
    {
        $static = new static();
        $static->command = $command;
        $static->description = $description;

        return $static;
    }
}
