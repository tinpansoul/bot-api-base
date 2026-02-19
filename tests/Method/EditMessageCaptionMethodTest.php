<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageCaptionMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;

final class EditMessageCaptionMethodTest extends MethodTestCase
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
                'caption' => 'caption',
                'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'reply_markup' => self::buildReplyMarkupArray(),
            ],
            editMessageCaptionMethod: EditMessageCaptionMethod::create(
                chatId: 'chat_id',
                messageId: 1,
                data: [
                    'caption' => 'caption',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'captionEntities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
                    'replyMarkup' => self::buildReplyMarkupObject(),
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
                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageCaptionMethod: EditMessageCaptionMethod::createInline(
                inlineMessageId: 'inline_message_id',
                data: [
                    'caption' => 'caption',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, mixed[]>|array<string, string>|array<string, int> $excepted
     */
    private function queryApi(array $excepted, EditMessageCaptionMethod $editMessageCaptionMethod): void
    {
        $this->getBot(
            methodName: 'editMessageCaption',
            request: $excepted,
            serialisedFields: ['reply_markup']
        )->editMessageCaption(editMessageCaptionMethod: $editMessageCaptionMethod);
    }
}
