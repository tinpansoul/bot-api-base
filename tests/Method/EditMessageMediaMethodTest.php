<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageMediaMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAnimationType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAudioType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaDocumentType;

final class EditMessageMediaMethodTest extends MethodTestCase
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
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaDocumentType',
                    'parse_mode' => 'Markdown',
                    'type' => 'document',
                    'thumb' => '',
                    'disable_content_type_detection' => true,
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageMediaMethod: EditMessageMediaMethod::create(
                chatId: 'chat_id',
                messageId: 1,
                inputMediaType: InputMediaDocumentType::create(media: InputFileType::create(path: '/dev/null'), data: [
                    'thumb' => InputFileType::create(path: '/dev/null'),
                    'caption' => 'InputMediaDocumentType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disableContentTypeDetection' => true,
                ]),
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
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
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaDocumentType',
                    'parse_mode' => 'Markdown',
                    'type' => 'document',
                    'thumb' => '',
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageMediaMethod: EditMessageMediaMethod::createInline(
                inlineMessageId: 'inline_message_id',
                inputMediaType: InputMediaDocumentType::create(media: InputFileType::create(path: '/dev/null'), data: [
                    'thumb' => InputFileType::create(path: '/dev/null'),
                    'caption' => 'InputMediaDocumentType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeMediaAudio(): void
    {
        $this->queryApi(
            excepted: [
                'inline_message_id' => 'inline_message_id',
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaAudioType',
                    'title' => 'title',
                    'parse_mode' => 'Markdown',
                    'duration' => 100,
                    'performer' => 'performer',
                    'type' => 'audio',
                    'thumb' => '',
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageMediaMethod: EditMessageMediaMethod::createInline(
                inlineMessageId: 'inline_message_id',
                inputMediaType: InputMediaAudioType::create(media: InputFileType::create(path: '/dev/null'), data: [
                    'thumb' => InputFileType::create(path: '/dev/null'),
                    'duration' => 100,
                    'performer' => 'performer',
                    'caption' => 'InputMediaAudioType',
                    'title' => 'title',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeMediaAnimation(): void
    {
        $this->queryApi(
            excepted: [
                'inline_message_id' => 'inline_message_id',
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaAnimationType',
                    'parse_mode' => 'Markdown',
                    'duration' => 100,
                    'width' => 320,
                    'height' => 320,
                    'type' => 'animation',
                    'thumb' => '',
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageMediaMethod: EditMessageMediaMethod::createInline(
                inlineMessageId: 'inline_message_id',
                inputMediaType: InputMediaAnimationType::create(media: InputFileType::create(path: '/dev/null'), data: [
                    'thumb' => InputFileType::create(path: '/dev/null'),
                    'duration' => 100,
                    'width' => 320,
                    'height' => 320,
                    'caption' => 'InputMediaAnimationType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, mixed[]>|array<string, string>|array<string, int> $excepted
     */
    private function queryApi(array $excepted, EditMessageMediaMethod $editMessageMediaMethod): void
    {
        $this->getBotWithFiles(
            methodName: 'editMessageMedia',
            request: $excepted,
            fileMap: ['media' => ['media' => true, 'thumb' => true]],
            serializableFields: ['media', 'reply_markup'],
            result: true
        )->editMessageMedia(editMessageMediaMethod: $editMessageMediaMethod);
    }
}
