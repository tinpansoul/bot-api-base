<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;

final class UnbanChatMemberMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $unbanChatMemberMethod = UnbanChatMemberMethod::create(chatId: 'chat_id', userId: 1, data: ['onlyIfBanned' => true]);

        self::assertEquals(expected: 'chat_id', actual: $unbanChatMemberMethod->chatId);
        self::assertEquals(expected: 1, actual: $unbanChatMemberMethod->userId);
        self::assertTrue(condition: $unbanChatMemberMethod->onlyIfBanned);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, string|int|bool> $expectedRequest
     */
    public function testEncode(UnbanChatMemberMethod $unbanChatMemberMethod, array $expectedRequest): void
    {
        $botApiComplete = $this->getBot(methodName: 'unbanChatMember', request: $expectedRequest, result: true);

        $botApiComplete->unbanChatMember(unbanChatMemberMethod: $unbanChatMemberMethod);
    }

    /**
     * @return array<string, array<UnbanChatMemberMethod|array<string, string|int|bool>>>
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                UnbanChatMemberMethod::create(chatId: 'chat_id', userId: 1),
                ['chat_id' => 'chat_id', 'user_id' => 1],
            ],
            'onlyIf BannedCase' => [
                UnbanChatMemberMethod::create(chatId: 'chat_id', userId: 1, data: ['onlyIfBanned' => true]),
                ['chat_id' => 'chat_id', 'user_id' => 1, 'only_if_banned' => true],
            ],
        ];
    }
}
