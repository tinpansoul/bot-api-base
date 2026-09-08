<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockPullQuotationType.
 *
 * A InputRichBlockPullQuotation element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockpullquotation
 */
class InputRichBlockPullQuotationType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Text of the block.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * Optional. Credit of the block.
     *
     * @var string|RichTextType|RichTextType[]|null
     */
    public $credit;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, ?array $data = null): InputRichBlockPullQuotationType
    {
        $static = new static();
        $static->type = self::TYPE_PULLQUOTE;
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
