<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextSpoilerType.
 *
 * A RichTextSpoiler element.
 *
 * @see https://core.telegram.org/bots/api#richtextspoiler
 */
class RichTextSpoilerType extends RichTextType
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
    public static function create(string|RichTextType|array $text, ?array $data = null): RichTextSpoilerType
    {
        $static = new static();
        $static->type = self::TYPE_SPOILER;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
