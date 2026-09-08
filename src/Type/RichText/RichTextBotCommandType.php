<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextBotCommandType.
 *
 * A RichTextBotCommand element.
 *
 * @see https://core.telegram.org/bots/api#richtextbotcommand
 */
class RichTextBotCommandType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The bot command.
     *
     * @var string
     */
    public $botCommand;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $botCommand, ?array $data = null): RichTextBotCommandType
    {
        $static = new static();
        $static->type = self::TYPE_BOT_COMMAND;
        $static->text = $text;
        $static->botCommand = $botCommand;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
