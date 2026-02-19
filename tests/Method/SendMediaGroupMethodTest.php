<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaPhotoType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaVideoType;

final class SendMediaGroupMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendMediaGroup(sendMediaGroupMethod: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'sendMediaGroup',
            request: [
                'chat_id' => 'chat_id',
                'media' => [
                    [
                        'media' => '',
                        'caption' => 'InputMediaPhotoType',
                        'parse_mode' => 'Markdown',
                        'type' => 'photo',
                    ],
                    [
                        'media' => '',
                        'caption' => 'InputMediaPhotoType',
                        'parse_mode' => 'Markdown',
                        'type' => 'video',

                        'thumb' => '',
                        'width' => 100,
                        'height' => 100,
                        'duration' => 100,
                        'support_streaming' => true,
                    ],
                ],
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'allow_sending_without_reply' => true,
            ],
            fileMap: ['media' => [
                ['media' => true],
                ['media' => true, 'thumb' => true],
            ]],
            serializableFields: ['media']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendMediaGroupMethod
    {
        return SendMediaGroupMethod::create(
            chatId: 'chat_id',
            media: [
                InputMediaPhotoType::create(media: InputFileType::create(path: '/dev/null'), data: [
                    'caption' => 'InputMediaPhotoType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                InputMediaVideoType::create(media: InputFileType::create(path: '/dev/null'), data: [
                    'thumb' => InputFileType::create(path: '/dev/null'),
                    'width' => 100,
                    'height' => 100,
                    'duration' => 100,
                    'supportStreaming' => true,
                    'caption' => 'InputMediaPhotoType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
            ],
            data: [
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
