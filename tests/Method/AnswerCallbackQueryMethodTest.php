<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerCallbackQueryMethod;

final class AnswerCallbackQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \Exception
     */
    public function testEncode(): void
    {
        $dateTime = new \DateTimeImmutable();

        $botApiComplete = $this->getBot(methodName: 'answerCallbackQuery', request: [
            'callback_query_id' => 'id',
            'text' => 'text of answer',
            'show_alert' => true,
            'url' => 'url',
            'cache_time' => $dateTime->format(format: 'U'),
        ], result: true);

        $botApiComplete->answerCallbackQuery(
            answerCallbackQueryMethod: AnswerCallbackQueryMethod::create(callbackQueryId: 'id', data: [
            'text' => 'text of answer',
            'showAlert' => true,
            'url' => 'url',
            'cacheTime' => $dateTime,
        ]));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \Exception
     */
    public function testEncodePartial(): void
    {
        $botApiComplete = $this->getBot(methodName: 'answerCallbackQuery', request: [
            'callback_query_id' => 'id',
        ], result: true);

        $botApiComplete->answerCallbackQuery(answerCallbackQueryMethod: AnswerCallbackQueryMethod::create(callbackQueryId: 'id'));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \Exception
     */
    public function testEncodeFalse(): void
    {
        $dateTime = new \DateTimeImmutable();

        $botApiComplete = $this->getBot(methodName: 'answerCallbackQuery', request: [
            'callback_query_id' => 'id',
            'text' => 'text of answer',
            'show_alert' => false,
            'url' => 'url',
            'cache_time' => $dateTime->format(format: 'U'),
        ], result: true);

        $botApiComplete->answerCallbackQuery(
            answerCallbackQueryMethod: AnswerCallbackQueryMethod::create(callbackQueryId: 'id', data: [
            'text' => 'text of answer',
            'showAlert' => false,
            'url' => 'url',
            'cacheTime' => $dateTime,
        ]));
    }
}
