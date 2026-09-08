<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockFooterType.
 *
 * A InputRichBlockFooter element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockfooter
 */
class InputRichBlockFooterType extends InputRichBlockType
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
    public static function create(string|RichTextType|array $text, ?array $data = null): InputRichBlockFooterType
    {
        $static = new static();
        $static->type = self::TYPE_FOOTER;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
