<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextUrlType.
 *
 * A RichTextUrl element.
 *
 * @see https://core.telegram.org/bots/api#richtexturl
 */
class RichTextUrlType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * URL of the link.
     *
     * @var string
     */
    public $url;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $url, ?array $data = null): RichTextUrlType
    {
        $static = new static();
        $static->type = self::TYPE_URL;
        $static->text = $text;
        $static->url = $url;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
