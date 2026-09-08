<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockBlockQuotationType.
 *
 * A InputRichBlockBlockQuotation element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockblockquotation
 */
class InputRichBlockBlockQuotationType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Content of the block.
     *
     * @var InputRichBlockType[]
     */
    public $blocks;

    /**
     * Optional. Credit of the block.
     *
     * @var string|RichTextType|RichTextType[]|null
     */
    public $credit;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $blocks, ?array $data = null): InputRichBlockBlockQuotationType
    {
        $static = new static();
        $static->type = self::TYPE_BLOCKQUOTE;
        $static->blocks = $blocks;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
