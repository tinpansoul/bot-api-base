<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\LocationType;
use TgBotApi\BotApiBase\Type\RichBlockCaptionType;

/**
 * Class InputRichBlockMapType.
 *
 * A InputRichBlockMap element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmap
 */
class InputRichBlockMapType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * Location of the center of the map.
     *
     * @var LocationType
     */
    public $location;

    /**
     * Map zoom level; 0-24.
     *
     * @var int
     */
    public $zoom;

    /**
     * Map width; 0-10000.
     *
     * @var int
     */
    public $width;

    /**
     * Map height; 0-10000.
     *
     * @var int
     */
    public $height;

    /**
     * Optional. Caption of the block.
     *
     * @var RichBlockCaptionType|null
     */
    public $caption;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(LocationType $location, int $zoom, int $width, int $height, ?array $data = null): InputRichBlockMapType
    {
        $static = new static();
        $static->type = self::TYPE_MAP;
        $static->location = $location;
        $static->zoom = $zoom;
        $static->width = $width;
        $static->height = $height;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
