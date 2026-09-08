<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputRichBlockListItemType.
 *
 * Describes one item of a list block.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocklistitem
 */
class InputRichBlockListItemType
{
    use FillFromArrayTrait;

    /**
     * The content of the item.
     *
     * @var InputRichBlockType[]
     */
    public $blocks;

    /**
     * Optional. Pass True if the item has a checkbox.
     *
     * @var bool|null
     */
    public $hasCheckbox;

    /**
     * Optional. Pass True if the item has a checked checkbox.
     *
     * @var bool|null
     */
    public $isChecked;

    /**
     * Optional. For ordered lists, the numeric value of the item label.
     *
     * @var int|null
     */
    public $value;

    /**
     * Optional. For ordered lists, the type of the item label; must be one of “a” for lowercase letters, “A” for
     * uppercase letters, “i” for lowercase Roman numerals, “I” for uppercase Roman numerals, or “1” for decimal
     * numbers.
     *
     * @var string|null
     */
    public $type;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $blocks, ?array $data = null): InputRichBlockListItemType
    {
        $static = new static();
        $static->blocks = $blocks;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
