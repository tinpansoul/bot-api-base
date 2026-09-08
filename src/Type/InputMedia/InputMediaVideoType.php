<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMedia;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputMediaVideoType.
 *
 * @see https://core.telegram.org/bots/api#inputmediavideo
 */
class InputMediaVideoType extends InputMediaType
{
    use FillFromArrayTrait;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data
     * under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumbnail;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data
     * under <file_attach_name>.
     *
     * @var InputFileType|string|null
     *
     * @deprecated since Bot API 6.6 Telegram renamed this field to "thumbnail";
     *             it is still accepted here and sent as "thumbnail". Use $thumbnail instead.
     */
    public $thumb;

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
     * Optional. Video duration.
     *
     * @var int|null
     */
    public $duration;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool|null
     */
    public $supportStreaming;

    /**
     * Optional. Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram servers
     * (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass
     * “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * More information on Sending Files ».
     *
     * @var string|null
     */
    public $cover;

    /**
     * Optional. Start timestamp for the video in the message.
     *
     * @var int|null
     */
    public $startTimestamp;

    /**
     * Optional. Pass True if the caption must be shown above the message media.
     *
     * @var bool|null
     */
    public $showCaptionAboveMedia;

    /**
     * Optional. Pass True if the uploaded video is suitable for streaming.
     *
     * @var bool|null
     */
    public $supportsStreaming;

    /**
     * Optional. Pass True if the video needs to be covered with a spoiler animation.
     *
     * @var bool|null
     */
    public $hasSpoiler;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|InputFileType $media, ?array $data = null): InputMediaVideoType
    {
        $static = new static();
        $static->media = $media;
        $static->type = static::TYPE_VIDEO;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
