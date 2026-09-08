<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAnimationType;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockAnimationType.
 *
 * A InputRichBlockAnimation element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockanimation
 */
class InputRichBlockAnimationType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The animation. Caption is ignored.
     *
     * @var InputMediaAnimationType
     */
    public $animation;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(InputMediaAnimationType $animation, ?array $data = null): InputRichBlockAnimationType
    {
        $static = new static();
        $static->type = self::TYPE_ANIMATION;
        $static->animation = $animation;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
