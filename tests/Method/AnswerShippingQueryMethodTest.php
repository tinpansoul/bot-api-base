<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerShippingQueryMethod;
use TgBotApi\BotApiBase\Type\LabeledPriceType;
use TgBotApi\BotApiBase\Type\ShippingOption;

final class AnswerShippingQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeSuccess(): void
    {
        $botApiComplete = $this->getBot(methodName: 'answerShippingQuery', request: [
            'shipping_query_id' => 'id',
            'shipping_options' => [
                [
                    'id' => 'id',
                    'title' => 'title',
                    'prices' => [
                        ['label' => 'label', 'amount' => 200],
                        ['label' => 'label_2', 'amount' => 300],
                    ],
                ],
                [
                    'id' => 'id',
                    'title' => 'title',
                    'prices' => [
                        ['label' => 'label', 'amount' => 200],
                        ['label' => 'label_2', 'amount' => 300],
                    ],
                ],
            ],
            'ok' => true,
        ], result: true);

        $answerShippingQueryMethod = AnswerShippingQueryMethod::createSuccess(
            shippingQueryId: 'id',
            shippingOptions: [
                ShippingOption::create(id: 'id', title: 'title', prices: [
                    LabeledPriceType::create(label: 'label', amount: 200),
                    LabeledPriceType::create(label: 'label_2', amount: 300),
                ]),
            ]
        );

        $answerShippingQueryMethod->addShippingOption(
            shippingOption: ShippingOption::create(id: 'id', title: 'title', prices: [
            LabeledPriceType::create(label: 'label', amount: 200),
            LabeledPriceType::create(label: 'label_2', amount: 300),
        ]));

        $botApiComplete->answerShippingQuery(answerShippingQueryMethod: $answerShippingQueryMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeFail(): void
    {
        $botApiComplete = $this->getBot(methodName: 'answerShippingQuery', request: [
            'shipping_query_id' => 'id',
            'ok' => false,
            'error_message' => 'message',
        ], result: true);

        $botApiComplete->answerShippingQuery(
            answerShippingQueryMethod: AnswerShippingQueryMethod::createFail(
            shippingQueryId: 'id',
            errorMessage: 'message'
        ));
    }
}
