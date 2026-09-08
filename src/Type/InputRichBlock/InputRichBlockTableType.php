<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichBlockTableCellType;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class InputRichBlockTableType.
 *
 * A InputRichBlockTable element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocktable
 */
class InputRichBlockTableType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Cells of the table.
     *
     * @var RichBlockTableCellType[][]
     */
    public $cells;

    /**
     * Optional. Pass True if the table has borders.
     *
     * @var bool|null
     */
    public $isBordered;

    /**
     * Optional. Pass True if the table is striped.
     *
     * @var bool|null
     */
    public $isStriped;

    /**
     * Optional. Caption of the table.
     *
     * @var string|RichTextType|RichTextType[]|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $cells, ?array $data = null): InputRichBlockTableType
    {
        $static = new static();
        $static->type = self::TYPE_TABLE;
        $static->cells = $cells;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
