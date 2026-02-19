<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnpinChatMessageMethod;

final class UnpinChatMessageMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $unpinChatMessageMethod = UnpinChatMessageMethod::create(chatId: 'chat_id', data: ['messageId' => 1]);

        self::assertEquals(expected: 'chat_id', actual: $unpinChatMessageMethod->chatId);
        self::assertEquals(expected: 1, actual: $unpinChatMessageMethod->messageId);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, string|int> $exceptedRequest
     */
    public function testEncode(UnpinChatMessageMethod $unpinChatMessageMethod, array $exceptedRequest): void
    {
        $botApiComplete = $this->getBot(methodName: 'unpinChatMessage', request: $exceptedRequest, result: true);

        $botApiComplete->unpinChatMessage(unpinChatMessageMethod: $unpinChatMessageMethod);
    }

    /**
     * @return array<string, array<UnpinChatMessageMethod|array<string, string|int>>>
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                UnpinChatMessageMethod::create(chatId: 'chat_id'),
                ['chat_id' => 'chat_id'],
            ],
            'with message id case' => [
                UnpinChatMessageMethod::create(chatId: 'chat_id', data: ['messageId' => 1]),
                ['chat_id' => 'chat_id', 'message_id' => 1],
            ],
        ];
    }
}
