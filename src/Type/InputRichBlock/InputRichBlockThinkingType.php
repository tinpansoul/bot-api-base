<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockThinkingType.
 *
 * A InputRichBlockThinking element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockthinking
 */
class InputRichBlockThinkingType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Text of the block. See https://t.me/addemoji/AIActions for examples of custom emoji that are recommended for
     * usage in the block.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, ?array $data = null): InputRichBlockThinkingType
    {
        $static = new static();
        $static->type = self::TYPE_THINKING;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
