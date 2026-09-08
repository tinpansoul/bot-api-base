<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputRichBlockDividerType.
 *
 * A InputRichBlockDivider element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdivider
 */
class InputRichBlockDividerType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(?array $data = null): InputRichBlockDividerType
    {
        $static = new static();
        $static->type = self::TYPE_DIVIDER;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
