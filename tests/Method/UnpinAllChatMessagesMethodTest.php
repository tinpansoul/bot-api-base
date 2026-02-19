<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnpinAllChatMessagesMethod;

final class UnpinAllChatMessagesMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $unpinAllChatMessagesMethod = UnpinAllChatMessagesMethod::create(chatId: 'chat_id');

        self::assertEquals(expected: 'chat_id', actual: $unpinAllChatMessagesMethod->chatId);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, string> $exceptedRequest
     */
    public function testEncode(UnpinAllChatMessagesMethod $unpinAllChatMessagesMethod, array $exceptedRequest): void
    {
        $botApiComplete = $this->getBot(methodName: 'unpinAllChatMessages', request: $exceptedRequest, result: true);

        $botApiComplete->unpinAllChatMessages(unpinAllChatMessagesMethod: $unpinAllChatMessagesMethod);
    }

    /**
     * @return array<string, array<UnpinAllChatMessagesMethod|array<string, string>>>
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                UnpinAllChatMessagesMethod::create(chatId: 'chat_id'),
                ['chat_id' => 'chat_id'],
            ],
        ];
    }
}
