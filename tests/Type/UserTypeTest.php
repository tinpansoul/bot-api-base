<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\UserType;

final class UserTypeTest extends TypeTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $result = [
            'id' => 1,
            'is_bot' => true,
            'first_name' => 'test',
            'last_name' => 'test',
            'username' => 'test',
            'language_code' => 'en',
        ];
        $botApi = $this->getBot(result: $result);

        $type = $botApi->call(method: $this->getMethod(), type: UserType::class);

        $this->assertEquals(expected: $type->id, actual: $result['id']);
        $this->assertEquals(expected: $type->isBot, actual: $result['is_bot']);
        $this->assertEquals(expected: $type->firstName, actual: $result['first_name']);
        $this->assertEquals(expected: $type->lastName, actual: $result['last_name']);
        $this->assertEquals(expected: $type->username, actual: $result['username']);
        $this->assertEquals(expected: $type->languageCode, actual: $result['language_code']);
    }
}
