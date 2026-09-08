<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputRichBlockListType.
 *
 * A InputRichBlockList element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocklist
 */
class InputRichBlockListType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Items of the list.
     *
     * @var InputRichBlockListItemType[]
     */
    public $items;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $items, ?array $data = null): InputRichBlockListType
    {
        $static = new static();
        $static->type = self::TYPE_LIST;
        $static->items = $items;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
