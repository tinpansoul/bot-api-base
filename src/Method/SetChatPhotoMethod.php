<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SetChatPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * New chat photo, uploaded using multipart/form-data.
     *
     * @var InputFileType
     */
    public $photo;

    public static function create(int|string $chatId, InputFileType $inputFileType): SetChatPhotoMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->photo = $inputFileType;

        return $static;
    }
}
