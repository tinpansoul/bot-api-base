<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\StopMessageLiveLocationMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

final class StopMessageLiveLocationMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'stopMessageLiveLocation', request: [
            'chat_id' => 'chat_id',
            'message_id' => 1,
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], result: true, serialisedFields: ['reply_markup']);

        $botApiComplete->stopMessageLiveLocation(
            stopMessageLiveLocationMethod: StopMessageLiveLocationMethod::create(chatId: 'chat_id', messageId: 1, data: [
            'replyMarkup' => $this->buildInlineMarkupObject(),
        ]));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline(): void
    {
        $botApiComplete = $this->getBot(methodName: 'stopMessageLiveLocation', request: [
            'inline_message_id' => 'message_id',
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], result: true, serialisedFields: ['reply_markup']);

        $botApiComplete->stopMessageLiveLocation(
            stopMessageLiveLocationMethod: StopMessageLiveLocationMethod::createInline(
            inlineMessageId: 'message_id', data: [
            'replyMarkup' => $this->buildInlineMarkupObject(),
        ]));
    }
}
