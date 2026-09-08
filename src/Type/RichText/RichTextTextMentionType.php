<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\UserType;

/**
 * Class RichTextTextMentionType.
 *
 * A RichTextTextMention element.
 *
 * @see https://core.telegram.org/bots/api#richtexttextmention
 */
class RichTextTextMentionType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The mentioned user.
     *
     * @var UserType
     */
    public $user;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, UserType $user, ?array $data = null): RichTextTextMentionType
    {
        $static = new static();
        $static->type = self::TYPE_TEXT_MENTION;
        $static->text = $text;
        $static->user = $user;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
