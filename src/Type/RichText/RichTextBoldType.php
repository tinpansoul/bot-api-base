<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextBoldType.
 *
 * A RichTextBold element.
 *
 * @see https://core.telegram.org/bots/api#richtextbold
 */
class RichTextBoldType extends RichTextType
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
    public static function create(string|RichTextType|array $text, ?array $data = null): RichTextBoldType
    {
        $static = new static();
        $static->type = self::TYPE_BOLD;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
