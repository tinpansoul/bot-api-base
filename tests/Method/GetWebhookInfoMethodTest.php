<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;

final class GetWebhookInfoMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getWebhookInfo', request: []);

        $botApiComplete->getWebhookInfo(getWebhookInfoMethod: GetWebhookInfoMethod::create());
    }
}
