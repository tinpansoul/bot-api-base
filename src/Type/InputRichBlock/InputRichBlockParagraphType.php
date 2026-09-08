<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockParagraphType.
 *
 * A InputRichBlockParagraph element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockparagraph
 */
class InputRichBlockParagraphType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Text of the block.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, ?array $data = null): InputRichBlockParagraphType
    {
        $static = new static();
        $static->type = self::TYPE_PARAGRAPH;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
