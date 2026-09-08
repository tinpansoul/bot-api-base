<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextUnderlineType.
 *
 * A RichTextUnderline element.
 *
 * @see https://core.telegram.org/bots/api#richtextunderline
 */
class RichTextUnderlineType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, ?array $data = null): RichTextUnderlineType
    {
        $static = new static();
        $static->type = self::TYPE_UNDERLINE;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
