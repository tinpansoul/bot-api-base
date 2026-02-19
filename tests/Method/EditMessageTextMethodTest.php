<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageTextMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;

final class EditMessageTextMethodTest extends MethodTestCase
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
                'text' => 'text',
                'entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],

                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_web_page_preview' => true,
                'reply_markup' => self::buildReplyMarkupArray(),
            ],
            editMessageTextMethod: EditMessageTextMethod::create(
                chatId: 'chat_id',
                messageId: 1,
                text: 'text',
                data: [
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disableWebPagePreview' => true,
                    'replyMarkup' => self::buildReplyMarkupObject(),
                    'entities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
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
                'text' => 'text',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_web_page_preview' => true,
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageTextMethod: EditMessageTextMethod::createInline(
                inlineMessageId: 'inline_message_id',
                text: 'text',
                data: [
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disableWebPagePreview' => true,
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<array<string, mixed>, mixed> $excepted
     */
    private function queryApi(array $excepted, EditMessageTextMethod $editMessageTextMethod): void
    {
        $this->getBot(
            methodName: 'editMessageText',
            request: $excepted,
            result: true,
            serialisedFields: ['reply_markup']
        )->editMessageText(editMessageTextMethod: $editMessageTextMethod);
    }
}
