<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;

final class SetChatDescriptionMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setChatDescription',
            request: ['chat_id' => 'chat_id', 'description' => 'description'],
            result: true
        );

        $botApiComplete->setChatDescription(setChatDescriptionMethod: SetChatDescriptionMethod::create(chatId: 'chat_id', data: ['description' => 'description']));
    }
}
