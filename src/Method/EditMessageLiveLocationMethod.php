<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageLiveLocationMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagelivelocation
 */
class EditMessageLiveLocationMethod implements EditMethodAliasInterface
{
    use EditMessageVariablesTrait;
    use FillFromArrayTrait;

    /**
     * Latitude of the location.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the location.
     *
     * @var float
     */
    public $longitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500.
     *
     * @var float|int|null
     */
    public $horizontalAccuracy;

    /**
     * Optional. Direction in which the user is moving, in degrees.
     * Must be between 1 and 360 if specified.
     *
     * @var int|null
     */
    public $heading;

    /**
     * Optional. Maximum distance for proximity alerts about
     * approaching another chat member, in meters.
     * Must be between 1 and 100000 if specified.
     *
     * @var int|null
     */
    public $proximityAlertRadius;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        int|string $chatId,
        int $messageId,
        float $latitude,
        float $longitude,
        array $data = null
    ): EditMessageLiveLocationMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->messageId = $messageId;
        $static->latitude = $latitude;
        $static->longitude = $longitude;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId', 'messageId', 'latitude', 'longitude', 'inlineMessageId']);
        }

        return $static;
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function createInline(
        string $inlineMessageId,
        float $latitude,
        float $longitude,
        array $data = null
    ): EditMessageLiveLocationMethod {
        $static = new static();
        $static->latitude = $latitude;
        $static->longitude = $longitude;
        $static->inlineMessageId = $inlineMessageId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId', 'latitude', 'longitude', 'inlineMessageId']);
        }

        return $static;
    }
}
