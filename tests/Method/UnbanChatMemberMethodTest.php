<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use PHPUnit\Framework\Attributes\DataProvider;
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
     * @param array<string, string|int|bool> $expectedRequest
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    #[DataProvider('provideData')]
    public function testEncode(UnbanChatMemberMethod $unbanChatMemberMethod, array $expectedRequest): void
    {
        $botApiComplete = $this->getBot(methodName: 'unbanChatMember', request: $expectedRequest, result: true);

        $botApiComplete->unbanChatMember(unbanChatMemberMethod: $unbanChatMemberMethod);
    }

    /**
     * @return array<string, array<UnbanChatMemberMethod|array<string, string|int|bool>>>
     */
    public static function provideData(): array
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
