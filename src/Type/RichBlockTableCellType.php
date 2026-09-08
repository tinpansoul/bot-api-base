<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class RichBlockTableCellType.
 *
 * Describes one cell of a table block.
 *
 * @see https://core.telegram.org/bots/api#richblocktablecell
 */
class RichBlockTableCellType
{
    use FillFromArrayTrait;

    /**
     * Optional. Text in the cell. If omitted, then the cell is invisible.
     *
     * @var string|RichTextType|RichTextType[]|null
     */
    public $text;

    /**
     * Optional. True, if the cell is a header cell.
     *
     * @var bool|null
     */
    public $isHeader;

    /**
     * Optional. The number of columns the cell spans if it is bigger than 1.
     *
     * @var int|null
     */
    public $colspan;

    /**
     * Optional. The number of rows the cell spans if it is bigger than 1.
     *
     * @var int|null
     */
    public $rowspan;

    /**
     * Horizontal cell content alignment. Currently, must be one of “left”, “center”, or “right”.
     *
     * @var string
     */
    public $align;

    /**
     * Vertical cell content alignment. Currently, must be one of “top”, “middle”, or “bottom”.
     *
     * @var string
     */
    public $valign;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $align, string $valign, ?array $data = null): RichBlockTableCellType
    {
        $static = new static();
        $static->align = $align;
        $static->valign = $valign;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
