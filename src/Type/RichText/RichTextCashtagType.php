<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextCashtagType.
 *
 * A RichTextCashtag element.
 *
 * @see https://core.telegram.org/bots/api#richtextcashtag
 */
class RichTextCashtagType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The cashtag.
     *
     * @var string
     */
    public $cashtag;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $cashtag, ?array $data = null): RichTextCashtagType
    {
        $static = new static();
        $static->type = self::TYPE_CASHTAG;
        $static->text = $text;
        $static->cashtag = $cashtag;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
