<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockDetailsType.
 *
 * A InputRichBlockDetails element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdetails
 */
class InputRichBlockDetailsType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Always shown summary of the block.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $summary;

    /**
     * Content of the block.
     *
     * @var InputRichBlockType[]
     */
    public $blocks;

    /**
     * Optional. Pass True if the content of the block is visible by default.
     *
     * @var bool|null
     */
    public $isOpen;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $summary, array $blocks, ?array $data = null): InputRichBlockDetailsType
    {
        $static = new static();
        $static->type = self::TYPE_DETAILS;
        $static->summary = $summary;
        $static->blocks = $blocks;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
