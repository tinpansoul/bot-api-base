<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

final class SendDocumentMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    public function testCreate(): void
    {
        $sendDocumentMethod = SendDocumentMethod::create(
            chatId: 'chat_id',
            document: InputFileType::create(path: '/dev/null'),
            data: [
                'thumb' => InputFileType::create(path: '/dev/null'),
                'caption' => 'caption',
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
                'disableContentTypeDetection' => true,
            ]
        );

        self::assertEquals(expected: 'chat_id', actual: $sendDocumentMethod->chatId);
        self::assertEquals(expected: InputFileType::create(path: '/dev/null'), actual: $sendDocumentMethod->document);
        self::assertEquals(expected: InputFileType::create(path: '/dev/null'), actual: $sendDocumentMethod->thumb);
        self::assertEquals(expected: 'caption', actual: $sendDocumentMethod->caption);
        self::assertEquals(expected: 'MarkdownV2', actual: $sendDocumentMethod->parseMode);
        self::assertTrue(condition: $sendDocumentMethod->disableNotification);
        self::assertEquals(expected: 1, actual: $sendDocumentMethod->replyToMessageId);
        self::assertEquals(expected: self::buildInlineMarkupObject(), actual: $sendDocumentMethod->replyMarkup);
        self::assertTrue(condition: $sendDocumentMethod->disableContentTypeDetection);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, mixed[]|string|bool|int> $request
     */
    public function testEncode(SendDocumentMethod $sendDocumentMethod, array $request): void
    {
        $this->getApi(request: $request)->sendDocument(sendDocumentMethod: $sendDocumentMethod);
        $this->getApi(request: $request)->send(sendMethodAlias: $sendDocumentMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @return array<string, array<SendDocumentMethod|array<string, mixed[]|bool|int|string>>>
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                SendDocumentMethod::create(
                    chatId: 'chat_id',
                    document: InputFileType::create(path: '/dev/null'),
                    data: [
                        'thumb' => InputFileType::create(path: '/dev/null'),
                        'caption' => 'caption',
                        'captionEntities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
                        'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'allowSendingWithoutReply' => true,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                    ]
                ),
                [
                    'chat_id' => 'chat_id',
                    'document' => '',
                    'thumb' => '',
                    'caption' => 'caption',
                    'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                    'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disable_notification' => true,
                    'reply_to_message_id' => 1,
                    'allow_sending_without_reply' => true,
                    'reply_markup' => self::buildInlineMarkupArray(),
                ],
            ],
            'Disable Content Type Detection case' => [
                SendDocumentMethod::create(
                    chatId: 'chat_id',
                    document: InputFileType::create(path: '/dev/null'),
                    data: [
                        'thumb' => InputFileType::create(path: '/dev/null'),

                        'caption' => 'caption',
                        'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,

                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                        'disableContentTypeDetection' => true,
                    ]
                ),
                [
                    'chat_id' => 'chat_id',
                    'document' => '',
                    'thumb' => '',

                    'caption' => 'caption',
                    'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,

                    'disable_notification' => true,
                    'reply_to_message_id' => 1,
                    'reply_markup' => self::buildInlineMarkupArray(),
                    'disable_content_type_detection' => true,
                ],
            ],
        ];
    }

    /**
     * @param array<string, mixed[]|bool|int|string> $request
     */
    private function getApi(array $request): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'sendDocument',
            request: $request,
            fileMap: ['document' => true, 'thumb' => true],
            serializableFields: ['reply_markup']
        );
    }
}
