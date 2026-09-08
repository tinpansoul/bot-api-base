<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextReferenceLinkType.
 *
 * A RichTextReferenceLink element.
 *
 * @see https://core.telegram.org/bots/api#richtextreferencelink
 */
class RichTextReferenceLinkType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The link text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The name of the reference.
     *
     * @var string
     */
    public $referenceName;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $referenceName, ?array $data = null): RichTextReferenceLinkType
    {
        $static = new static();
        $static->type = self::TYPE_REFERENCE_LINK;
        $static->text = $text;
        $static->referenceName = $referenceName;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
