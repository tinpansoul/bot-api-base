<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockSlideshowType.
 *
 * A InputRichBlockSlideshow element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockslideshow
 */
class InputRichBlockSlideshowType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Elements of the slideshow.
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
    public static function create(array $blocks, ?array $data = null): InputRichBlockSlideshowType
    {
        $static = new static();
        $static->type = self::TYPE_SLIDESHOW;
        $static->blocks = $blocks;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
