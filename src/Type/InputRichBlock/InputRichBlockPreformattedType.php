<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockPreformattedType.
 *
 * A InputRichBlockPreformatted element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockpreformatted
 */
class InputRichBlockPreformattedType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Text of the block.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * Optional. The programming language of the text.
     *
     * @var string|null
     */
    public $language;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, ?array $data = null): InputRichBlockPreformattedType
    {
        $static = new static();
        $static->type = self::TYPE_PRE;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
