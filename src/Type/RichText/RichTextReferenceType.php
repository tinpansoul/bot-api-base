<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextReferenceType.
 *
 * A RichTextReference element.
 *
 * @see https://core.telegram.org/bots/api#richtextreference
 */
class RichTextReferenceType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * Text of the reference.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The name of the reference.
     *
     * @var string
     */
    public $name;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $name, ?array $data = null): RichTextReferenceType
    {
        $static = new static();
        $static->type = self::TYPE_REFERENCE;
        $static->text = $text;
        $static->name = $name;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
