<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaVideoType;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockVideoType.
 *
 * A InputRichBlockVideo element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvideo
 */
class InputRichBlockVideoType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The video. Caption is ignored.
     *
     * @var InputMediaVideoType
     */
    public $video;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(InputMediaVideoType $video, ?array $data = null): InputRichBlockVideoType
    {
        $static = new static();
        $static->type = self::TYPE_VIDEO;
        $static->video = $video;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
