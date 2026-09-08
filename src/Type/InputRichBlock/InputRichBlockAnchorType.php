<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputRichBlockAnchorType.
 *
 * A InputRichBlockAnchor element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockanchor
 */
class InputRichBlockAnchorType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The name of the anchor.
     *
     * @var string
     */
    public $name;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $name, ?array $data = null): InputRichBlockAnchorType
    {
        $static = new static();
        $static->type = self::TYPE_ANCHOR;
        $static->name = $name;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
