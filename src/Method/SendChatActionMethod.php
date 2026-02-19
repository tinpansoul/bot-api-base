<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasActionVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class SendChatActionMethod.
 *
 * @see https://core.telegram.org/bots/api#sendchataction
 */
class SendChatActionMethod implements HasActionVariableInterface, MethodInterface
{
    use ChatIdVariableTrait;

    /**
     * Type of action to broadcast.
     * Choose one, depending on what the user is about to receive:
     * typing for text messages,
     * upload_photo for photos,
     * record_video or upload_video for videos,
     * record_audio or upload_audio for audio files,
     * upload_document for general files,
     * find_location for location data,
     * record_video_note or upload_video_note for video notes.
     *
     * @var string
     */
    public $action;

    public static function create(int|string $chatId, string $action): SendChatActionMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->action = $action;

        return $static;
    }
}
