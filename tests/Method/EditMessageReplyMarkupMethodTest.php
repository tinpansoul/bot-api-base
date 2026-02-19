<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageReplyMarkupMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;

final class EditMessageReplyMarkupMethodTest extends MethodTestCase
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
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageReplyMarkupMethod: EditMessageReplyMarkupMethod::create(
                chatId: 'chat_id',
                messageId: 1,
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
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            editMessageReplyMarkupMethod: EditMessageReplyMarkupMethod::createInline(
                inlineMessageId: 'inline_message_id',
                data: [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, mixed[]>|array<string, string>|array<string, int> $excepted
     */
    private function queryApi(array $excepted, EditMessageReplyMarkupMethod $editMessageReplyMarkupMethod): void
    {
        $this->getBot(
            methodName: 'editMessageReplyMarkup',
            request: $excepted,
            result: true,
            serialisedFields: ['reply_markup']
        )->editMessageReplyMarkup(editMessageReplyMarkupMethod: $editMessageReplyMarkupMethod);
    }
}
