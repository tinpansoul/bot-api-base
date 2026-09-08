<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockCollageType.
 *
 * A InputRichBlockCollage element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockcollage
 */
class InputRichBlockCollageType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Elements of the collage.
     *
     * @var InputRichBlockType[]
     */
    public $blocks;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $blocks, ?array $data = null): InputRichBlockCollageType
    {
        $static = new static();
        $static->type = self::TYPE_COLLAGE;
        $static->blocks = $blocks;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
