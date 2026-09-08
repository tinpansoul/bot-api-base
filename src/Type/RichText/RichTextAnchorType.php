<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextAnchorType.
 *
 * A RichTextAnchor element.
 *
 * @see https://core.telegram.org/bots/api#richtextanchor
 */
class RichTextAnchorType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The name of the anchor.
     *
     * @var string
     */
    public $name;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $name, ?array $data = null): RichTextAnchorType
    {
        $static = new static();
        $static->type = self::TYPE_ANCHOR;
        $static->name = $name;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
