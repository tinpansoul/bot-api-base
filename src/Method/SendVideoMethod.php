<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\CaptionVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendVideoMethod.
 *
 * @see https://core.telegram.org/bots/api#sendvideo
 */
class SendVideoMethod implements HasParseModeVariableInterface, SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;

    /**
     * Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a video from the Internet,
     * or upload a new video using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $video;

    /**
     * Optional. Duration of sent video in seconds.
     *
     * @var int|null
     */
    public $duration;

    /**
     * Optional. Video width.
     *
     * @var int|null
     */
    public $width;

    /**
     * Optional. Video height.
     *
     * @var int|null
     */
    public $height;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>”
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumbnail;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>”
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     *
     * @var InputFileType|string|null
     *
     * @deprecated since Bot API 6.6 Telegram renamed this field to "thumbnail";
     *             it is still accepted here and sent as "thumbnail". Use $thumbnail instead.
     */
    public $thumb;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool|null
     */
    public $supportsStreaming;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool|null
     *
     * @deprecated Misspelled; the Bot API field is "supports_streaming". Still accepted here and
     *             sent under the correct name. Use $supportsStreaming instead.
     */
    public $supportStreaming;

    /**
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(int|string $chatId, string|InputFileType $video, ?array $data = null): SendVideoMethod
    {
        $static = new static();
        $static->chatId = $chatId;
        $static->video = $video;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
