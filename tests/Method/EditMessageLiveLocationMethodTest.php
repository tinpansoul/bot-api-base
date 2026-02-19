<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageLiveLocationMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;

final class EditMessageLiveLocationMethodTest extends MethodTestCase
{
    use ReplyKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->queryApi(
            excepted: [
                'chat_id' => 'chat_id',
                'message_id' => 1,
                'latitude' => 51.5287718,
                'longitude' => -0.2416802,
                'reply_markup' => $this->buildReplyMarkupArray(),
                'horizontal_accuracy' => 100.2,
                'heading' => 1,
                'proximity_alert_radius' => 20,
            ],
            editMessageLiveLocationMethod: EditMessageLiveLocationMethod::create(
                chatId: 'chat_id',
                messageId: 1,
                latitude: 51.5287718,
                longitude: -0.2416802,
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                    'horizontalAccuracy' => 100.2,
                    'heading' => 1,
                    'proximityAlertRadius' => 20,
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline(): void
    {
        $this->queryApi(
            excepted: [
                'inline_message_id' => 'inline_message_id',
                'latitude' => 51.5287718,
                'longitude' => -0.2416802,
                'reply_markup' => $this->buildReplyMarkupArray(),
                'horizontal_accuracy' => 100.2,
                'heading' => 1,
                'proximity_alert_radius' => 20,
            ],
            editMessageLiveLocationMethod: EditMessageLiveLocationMethod::createInline(
                inlineMessageId: 'inline_message_id',
                latitude: 51.5287718,
                longitude: -0.2416802,
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                    'horizontalAccuracy' => 100.2,
                    'heading' => 1,
                    'proximityAlertRadius' => 20,
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<array<string, mixed>, mixed> $excepted
     */
    private function queryApi(array $excepted, EditMessageLiveLocationMethod $editMessageLiveLocationMethod): void
    {
        $this->getBot(
            methodName: 'editMessageLiveLocation',
            request: $excepted,
            result: true,
            serialisedFields: ['reply_markup']
        )->editMessageLiveLocation(editMessageLiveLocationMethod: $editMessageLiveLocationMethod);
    }
}
