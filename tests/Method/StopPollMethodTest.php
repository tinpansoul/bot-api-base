<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\StopPollMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

final class StopPollMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws BadArgumentException
     * @throws ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'stopPoll',
            request: ['chat_id' => 'chat_id', 'message_id' => 1, 'reply_markup' => $this->buildInlineMarkupArray()],
            result: [],
            serialisedFields: ['reply_markup']
        );

        $botApiComplete->stopPoll(
            stopPollMethod: StopPollMethod::create(
            chatId: 'chat_id',
            messageId: 1,
            data: ['replyMarkup' => $this->buildInlineMarkupObject()]
        ));
    }
}
