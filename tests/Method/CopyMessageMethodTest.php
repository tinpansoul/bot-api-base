<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\CopyMessageMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;

final class CopyMessageMethodTest extends MethodTestCase
{
    use ReplyKeyboardMarkupTrait;

    public function testCreate(): void
    {
        $copyMessageMethod = CopyMessageMethod::create(chatId: 1, fromChatId: 2, messageId: 3, data: [
            'caption' => 'caption',
            'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
            'disableNotification' => true,
            'replyToMessageId' => 0,
            'replyMarkup' => self::buildReplyMarkupObject(),
        ]);

        self::assertEquals(expected: 1, actual: $copyMessageMethod->chatId);
        self::assertEquals(expected: 2, actual: $copyMessageMethod->fromChatId);
        self::assertEquals(expected: 3, actual: $copyMessageMethod->messageId);
        self::assertEquals(expected: 'caption', actual: $copyMessageMethod->caption);
        self::assertEquals(expected: 'MarkdownV2', actual: $copyMessageMethod->parseMode);
        self::assertTrue(condition: $copyMessageMethod->disableNotification);
        self::assertEquals(expected: 0, actual: $copyMessageMethod->replyToMessageId);
        self::assertInstanceOf(expected: ReplyKeyboardMarkupType::class, actual: $copyMessageMethod->replyMarkup);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, mixed> $exceptedRequest
     * @param string[] $serializedFields
     */
    public function testEncode(CopyMessageMethod $copyMessageMethod, array $exceptedRequest, array $serializedFields): void
    {
        $botApiComplete = $this->getBot(methodName: 'copyMessage', request: $exceptedRequest, serialisedFields: $serializedFields);

        $botApiComplete->copyMessage(copyMessageMethod: $copyMessageMethod);
    }

    /**
     * @return array<string, array<CopyMessageMethod|array<array<string, mixed>|int|string, mixed>>>
     */
    public function provideData(): array
    {
        return [
            'minimal case case' => [
                CopyMessageMethod::create(chatId: 1, fromChatId: 1, messageId: 1),
                ['chat_id' => 1, 'from_chat_id' => 1, 'message_id' => 1],
                [],
            ],
            'with all fields' => [
                CopyMessageMethod::create(chatId: 1, fromChatId: 1, messageId: 1, data: [
                    'caption' => 'caption',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
                    'disableNotification' => true,
                    'replyToMessageId' => 0,
                    'allowSendingWithoutReply' => true,
                    'replyMarkup' => self::buildReplyMarkupObject(),
                    'captionEntities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
                ]),
                [
                    'chat_id' => 1,
                    'from_chat_id' => 1,
                    'message_id' => 1,
                    'caption' => 'caption',
                    'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
                    'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                    'disable_notification' => true,
                    'reply_to_message_id' => 0,
                    'allow_sending_without_reply' => true,
                    'reply_markup' => self::buildReplyMarkupArray(),
                ],
                ['reply_markup'],
            ],
        ];
    }
}
