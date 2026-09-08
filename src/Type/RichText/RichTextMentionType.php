<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextMentionType.
 *
 * A RichTextMention element.
 *
 * @see https://core.telegram.org/bots/api#richtextmention
 */
class RichTextMentionType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The username.
     *
     * @var string
     */
    public $username;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $username, ?array $data = null): RichTextMentionType
    {
        $static = new static();
        $static->type = self::TYPE_MENTION;
        $static->text = $text;
        $static->username = $username;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
