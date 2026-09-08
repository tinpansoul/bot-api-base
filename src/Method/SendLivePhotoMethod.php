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
 * Class SendLivePhotoMethod.
 *
 * Use this method to send a live photo. On success, the sent Message is returned.
 *
 * @see https://core.telegram.org/bots/api#sendlivephoto
 */
class SendLivePhotoMethod implements SendMethodAliasInterface, HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;

    /**
     * The live photo animation to send.
     *
     * @var InputFileType|string
     */
    public $livePhoto;

    /**
     * The static image of the live photo to send.
     *
     * @var InputFileType|string
     */
    public $photo;

    /**
     * Optional. Unique identifier of the business connection on behalf of which the message
     * will be sent.
     *
     * @var string|null
     */
    public $businessConnectionId;

    /**
     * Optional. Unique identifier for the target message thread of a forum supergroup.
     *
     * @var int|null
     */
    public $messageThreadId;

    /**
     * Optional. Pass True if the caption must be shown above the message media.
     *
     * @var bool|null
     */
    public $showCaptionAboveMedia;

    /**
     * Optional. Pass True if the photo needs to be covered with a spoiler animation.
     *
     * @var bool|null
     */
    public $hasSpoiler;

    /**
     * Optional. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits
     * for a fee of 0.1 Telegram Stars per message.
     *
     * @var bool|null
     */
    public $allowPaidBroadcast;

    /**
     * Optional. Unique identifier of the message effect to be added to the message.
     *
     * @var string|null
     */
    public $messageEffectId;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        int|string $chatId,
        InputFileType|string $livePhoto,
        InputFileType|string $photo,
        ?array $data = null,
    ): SendLivePhotoMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->livePhoto = $livePhoto;
        $static->photo = $photo;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
