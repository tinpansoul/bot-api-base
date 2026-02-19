<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteWebhookMethod;

final class DeleteWebhookMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $deleteWebhookMethod = DeleteWebhookMethod::create(data: ['dropPendingUpdates' => true]);
        self::assertTrue(condition: $deleteWebhookMethod->dropPendingUpdates);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, bool> $exceptedBody
     */
    public function testEncode(DeleteWebhookMethod $deleteWebhookMethod, array $exceptedBody): void
    {
        $botApiComplete = $this->getBot(methodName: 'deleteWebhook', request: $exceptedBody, result: true);

        $botApiComplete->deleteWebhook(deleteWebhookMethod: $deleteWebhookMethod);
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
                DeleteWebhookMethod::create(),
                [],
            ],
            'drop pending updates case' => [
                DeleteWebhookMethod::create(data: ['dropPendingUpdates' => true]),
                ['drop_pending_updates' => true],
            ],
        ];
    }
}
