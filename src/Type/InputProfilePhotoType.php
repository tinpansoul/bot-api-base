<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class InputProfilePhotoType.
 *
 * Describes a profile photo to set. The Bot API models this as a union of a static and an
 * animated variant, distinguished by the type field.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephoto
 */
class InputProfilePhotoType
{
    public const TYPE_STATIC = 'static';

    public const TYPE_ANIMATED = 'animated';

    /**
     * Type of the profile photo, one of the TYPE_* constants.
     *
     * @var string
     */
    public $type;

    /**
     * Optional. The static profile photo. Used for the "static" type. Profile photos can't be
     * reused and can only be uploaded as a new file.
     *
     * @var InputFileType|string|null
     */
    public $photo;

    /**
     * Optional. The animated profile photo. Used for the "animated" type.
     *
     * @var InputFileType|string|null
     */
    public $animation;

    /**
     * Optional. Timestamp in seconds of the frame that will be used as the static profile photo.
     * Defaults to 0.0.
     *
     * @var float|null
     */
    public $mainFrameTimestamp;

    public static function createStatic(InputFileType|string $photo): InputProfilePhotoType
    {
        $static = new static();
        $static->type = self::TYPE_STATIC;
        $static->photo = $photo;

        return $static;
    }

    public static function createAnimated(
        InputFileType|string $animation,
        ?float $mainFrameTimestamp = null,
    ): InputProfilePhotoType {
        $static = new static();
        $static->type = self::TYPE_ANIMATED;
        $static->animation = $animation;
        $static->mainFrameTimestamp = $mainFrameTimestamp;

        return $static;
    }
}
