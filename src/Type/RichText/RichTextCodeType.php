<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextCodeType.
 *
 * A RichTextCode element.
 *
 * @see https://core.telegram.org/bots/api#richtextcode
 */
class RichTextCodeType extends RichTextType
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
    public static function create(string|RichTextType|array $text, ?array $data = null): RichTextCodeType
    {
        $static = new static();
        $static->type = self::TYPE_CODE;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
