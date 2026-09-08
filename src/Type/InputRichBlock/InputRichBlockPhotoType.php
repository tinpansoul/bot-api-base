<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaPhotoType;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockPhotoType.
 *
 * A InputRichBlockPhoto element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockphoto
 */
class InputRichBlockPhotoType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The photo. Caption is ignored.
     *
     * @var InputMediaPhotoType
     */
    public $photo;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(InputMediaPhotoType $photo, ?array $data = null): InputRichBlockPhotoType
    {
        $static = new static();
        $static->type = self::TYPE_PHOTO;
        $static->photo = $photo;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
