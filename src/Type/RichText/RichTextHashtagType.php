<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextHashtagType.
 *
 * A RichTextHashtag element.
 *
 * @see https://core.telegram.org/bots/api#richtexthashtag
 */
class RichTextHashtagType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The hashtag.
     *
     * @var string
     */
    public $hashtag;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $hashtag, ?array $data = null): RichTextHashtagType
    {
        $static = new static();
        $static->type = self::TYPE_HASHTAG;
        $static->text = $text;
        $static->hashtag = $hashtag;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
