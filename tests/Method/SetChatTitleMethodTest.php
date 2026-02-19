<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatTitleMethod;

final class SetChatTitleMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setChatTitle',
            request: ['chat_id' => 'chat_id', 'title' => 'title'],
            result: true
        );

        $botApiComplete->setChatTitle(setChatTitleMethod: SetChatTitleMethod::create(chatId: 'chat_id', title: 'title'));
    }
}
