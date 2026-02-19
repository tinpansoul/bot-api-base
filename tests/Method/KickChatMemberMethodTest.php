<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\KickChatMemberMethod;

/**
 * Class KickChatMemberMethodTest.
 */
final class KickChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \Exception
     */
    public function testEncode(): void
    {
        $dateTime = new \DateTimeImmutable();
        $botApiComplete = $this->getBot(methodName: 'kickChatMember', request: [
            'chat_id' => 1,
            'user_id' => 1,
            'until_date' => $dateTime->format(format: 'U'),
        ], result: true);

        $botApiComplete->kickChatMember(kickChatMemberMethod: KickChatMemberMethod::create(chatId: 1, userId: 1, data: ['untilDate' => $dateTime]));
    }
}
