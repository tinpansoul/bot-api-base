<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Type\InputProfilePhotoType;

/**
 * Class SetMyProfilePhotoMethod.
 *
 * Use this method to change the bot's profile photo. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmyprofilephoto
 */
class SetMyProfilePhotoMethod implements SetMethodAliasInterface
{
    /**
     * The new profile photo to set.
     *
     * @var InputProfilePhotoType
     */
    public $photo;

    public static function create(InputProfilePhotoType $photo): SetMyProfilePhotoMethod
    {
        $static = new static();
        $static->photo = $photo;

        return $static;
    }
}
