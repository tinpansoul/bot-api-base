<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextAnchorLinkType.
 *
 * A RichTextAnchorLink element.
 *
 * @see https://core.telegram.org/bots/api#richtextanchorlink
 */
class RichTextAnchorLinkType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The link text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The name of the anchor. If the name is empty, then the link brings back to the top of the message.
     *
     * @var string
     */
    public $anchorName;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $anchorName, ?array $data = null): RichTextAnchorLinkType
    {
        $static = new static();
        $static->type = self::TYPE_ANCHOR_LINK;
        $static->text = $text;
        $static->anchorName = $anchorName;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
