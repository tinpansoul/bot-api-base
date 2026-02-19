<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

final class SendVenueMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendVenue(sendVenueMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot(methodName: 'sendVenue', request: [
            'chat_id' => 1,
            'latitude' => 51.5287718,
            'longitude' => -0.2416802,
            'title' => 'title',
            'address' => 'address',
            'foursquare_id' => 'id',
            'foursquare_type' => 'arts_entertainment/default',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => self::buildInlineMarkupArray(),
            'google_place_type' => 'google_place_type',
            'google_place_id' => 'google_place_id',
            'allow_sending_without_reply' => true,
        ], result: [], serialisedFields: ['reply_markup']);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendVenueMethod
    {
        return SendVenueMethod::create(
            chatId: 1,
            latitude: 51.5287718,
            longitude: -0.2416802,
            title: 'title',
            address: 'address',
            data: [
                'foursquareId' => 'id',
                'foursquareType' => 'arts_entertainment/default',
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
                'googlePlaceId' => 'google_place_id',
                'googlePlaceType' => 'google_place_type',
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
