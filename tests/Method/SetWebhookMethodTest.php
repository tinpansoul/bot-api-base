<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetWebhookMethod;
use TgBotApi\BotApiBase\Type\InputFileType;

final class SetWebhookMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $setWebhookMethod = SetWebhookMethod::create(
            url: 'https://url',
            data: [
                'certificate' => InputFileType::create(path: '/dev/null'),
                'maxConnections' => 100,
                'ipAddress' => '0.0.0.0',
                'allowedUpdates' => [
                    SetWebhookMethod::TYPE_SHIPPING_QUERY,
                    SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                    SetWebhookMethod::TYPE_MESSAGE,
                    SetWebhookMethod::TYPE_INLINE_QUERY,
                    SetWebhookMethod::TYPE_EDITED_MESSAGE,
                    SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                    SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                    SetWebhookMethod::TYPE_CHANNEL_POST,
                    SetWebhookMethod::TYPE_CALLBACK_QUERY,
                ],
                'dropPendingUpdates' => true,
            ]
        );

        self::assertEquals(expected: 'https://url', actual: $setWebhookMethod->url);
        self::assertEquals(expected: InputFileType::create(path: '/dev/null'), actual: $setWebhookMethod->certificate);
        self::assertEquals(expected: 100, actual: $setWebhookMethod->maxConnections);
        self::assertEquals(expected: '0.0.0.0', actual: $setWebhookMethod->ipAddress);
        self::assertEqualsCanonicalizing(expected: [
            'message',
            'edited_message',
            'channel_post',
            'edited_channel_post',
            'inline_query',
            'chosen_inline_result',
            'callback_query',
            'shipping_query',
            'pre_checkout_query',
        ], actual: $setWebhookMethod->allowedUpdates);
        self::assertTrue(condition: $setWebhookMethod->dropPendingUpdates);
    }

    /**
     * @dataProvider provideData
     *
     * @param $expectedBody
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, string[]|string|int|bool> $expectedBody
     */
    public function testEncode(SetWebhookMethod $setWebhookMethod, array $expectedBody): void
    {
        $botApiComplete = $this->getBotWithFiles(
            methodName: 'setWebhook',
            request: $expectedBody,
            fileMap: ['certificate' => true],
            result: true
        );

        $botApiComplete->setWebhook(setWebhookMethod: $setWebhookMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return array[]
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                SetWebhookMethod::create(
                    url: 'https://url',
                    data: [
                        'certificate' => InputFileType::create(path: '/dev/null'),
                        'maxConnections' => 100,
                        'allowedUpdates' => [
                            SetWebhookMethod::TYPE_SHIPPING_QUERY,
                            SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                            SetWebhookMethod::TYPE_MESSAGE,
                            SetWebhookMethod::TYPE_INLINE_QUERY,
                            SetWebhookMethod::TYPE_EDITED_MESSAGE,
                            SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                            SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                            SetWebhookMethod::TYPE_CHANNEL_POST,
                            SetWebhookMethod::TYPE_CALLBACK_QUERY,
                        ],
                    ]
                ),
                [
                    'url' => 'https://url',
                    'certificate' => '',
                    'max_connections' => 100,
                    'allowed_updates' => [
                        SetWebhookMethod::TYPE_SHIPPING_QUERY,
                        SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                        SetWebhookMethod::TYPE_MESSAGE,
                        SetWebhookMethod::TYPE_INLINE_QUERY,
                        SetWebhookMethod::TYPE_EDITED_MESSAGE,
                        SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                        SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                        SetWebhookMethod::TYPE_CHANNEL_POST,
                        SetWebhookMethod::TYPE_CALLBACK_QUERY,
                    ],
                ],
            ],
            'drop updates case' => [
                SetWebhookMethod::create(
                    url: 'https://url',
                    data: [
                        'certificate' => InputFileType::create(path: '/dev/null'),
                        'maxConnections' => 100,
                        'allowedUpdates' => [
                            SetWebhookMethod::TYPE_SHIPPING_QUERY,
                            SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                            SetWebhookMethod::TYPE_MESSAGE,
                            SetWebhookMethod::TYPE_INLINE_QUERY,
                            SetWebhookMethod::TYPE_EDITED_MESSAGE,
                            SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                            SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                            SetWebhookMethod::TYPE_CHANNEL_POST,
                            SetWebhookMethod::TYPE_CALLBACK_QUERY,
                        ],
                        'dropPendingUpdates' => true,
                    ]
                ),
                [
                    'url' => 'https://url',
                    'certificate' => '',
                    'max_connections' => 100,
                    'allowed_updates' => [
                        SetWebhookMethod::TYPE_SHIPPING_QUERY,
                        SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                        SetWebhookMethod::TYPE_MESSAGE,
                        SetWebhookMethod::TYPE_INLINE_QUERY,
                        SetWebhookMethod::TYPE_EDITED_MESSAGE,
                        SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                        SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                        SetWebhookMethod::TYPE_CHANNEL_POST,
                        SetWebhookMethod::TYPE_CALLBACK_QUERY,
                    ],
                    'drop_pending_updates' => true,
                ],
            ],
            'with local ip case' => [
                SetWebhookMethod::create(
                    url: 'https://url',
                    data: [
                        'certificate' => InputFileType::create(path: '/dev/null'),
                        'maxConnections' => 100,
                        'ipAddress' => '0.0.0.0',
                        'allowedUpdates' => [
                            SetWebhookMethod::TYPE_SHIPPING_QUERY,
                            SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                            SetWebhookMethod::TYPE_MESSAGE,
                            SetWebhookMethod::TYPE_INLINE_QUERY,
                            SetWebhookMethod::TYPE_EDITED_MESSAGE,
                            SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                            SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                            SetWebhookMethod::TYPE_CHANNEL_POST,
                            SetWebhookMethod::TYPE_CALLBACK_QUERY,
                        ],
                    ]
                ),
                [
                    'url' => 'https://url',
                    'certificate' => '',
                    'max_connections' => 100,
                    'ip_address' => '0.0.0.0',
                    'allowed_updates' => [
                        SetWebhookMethod::TYPE_SHIPPING_QUERY,
                        SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                        SetWebhookMethod::TYPE_MESSAGE,
                        SetWebhookMethod::TYPE_INLINE_QUERY,
                        SetWebhookMethod::TYPE_EDITED_MESSAGE,
                        SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                        SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                        SetWebhookMethod::TYPE_CHANNEL_POST,
                        SetWebhookMethod::TYPE_CALLBACK_QUERY,
                    ],
                ],
            ],
        ];
    }
}
