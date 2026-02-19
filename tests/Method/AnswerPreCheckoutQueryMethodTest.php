<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerPreCheckoutQueryMethod;

final class AnswerPreCheckoutQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeSuccess(): void
    {
        $botApiComplete = $this->getBot(methodName: 'answerPreCheckoutQuery', request: [
            'pre_checkout_query_id' => 'id',
            'ok' => true,
        ], result: true);

        $botApiComplete->answerPreCheckoutQuery(answerPreCheckoutQueryMethod: AnswerPreCheckoutQueryMethod::createSuccess(preCheckoutQueryId: 'id'));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeFail(): void
    {
        $botApiComplete = $this->getBot(methodName: 'answerPreCheckoutQuery', request: [
            'pre_checkout_query_id' => 'id',
            'ok' => false,
            'error_message' => 'message',
        ], result: true);

        $botApiComplete->answerPreCheckoutQuery(
            answerPreCheckoutQueryMethod: AnswerPreCheckoutQueryMethod::createFail(
            preCheckoutQueryId: 'id',
            errorMessage: 'message'
        ));
    }
}
