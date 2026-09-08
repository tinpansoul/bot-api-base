<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockSectionHeadingType.
 *
 * A InputRichBlockSectionHeading element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocksectionheading
 */
class InputRichBlockSectionHeadingType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Text of the block.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * Relative size of the text font; 1-6, 1 is the largest, 6 is the smallest.
     *
     * @var int
     */
    public $size;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, int $size, ?array $data = null): InputRichBlockSectionHeadingType
    {
        $static = new static();
        $static->type = self::TYPE_HEADING;
        $static->text = $text;
        $static->size = $size;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
