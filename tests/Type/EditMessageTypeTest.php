<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\UserType;

final class EditMessageTypeTest extends TypeTestCase
{
    /**
     * @throws ResponseException
     */
    public function testEncode(): void
    {
        $result = [
            'message_id' => 0,
            'from' => [
                    'id' => 0,
                    'is_bot' => true,
                    'first_name' => 'first_name',
                    'username' => 'username',
                ],
            'chat' => [
                    'id' => 0,
                    'first_name' => 'first_name',
                    'username' => 'username',
                    'type' => 'private',
                ],
            'date' => 1556950485,
            'edit_date' => 1556950491,
            'text' => 'text',
        ];

        $botApi = $this->getBot(result: $result);

        /** @var MessageType $type */
        $type = $botApi->call(method: $this->getMethod(), type: MessageType::class . '|bool');

        $this->assertInstanceOf(expected: MessageType::class, actual: $type);
        $this->assertEquals(expected: 'text', actual: $type->text);
        $this->assertEquals(expected: 0, actual: $type->messageId);
        $this->assertInstanceOf(expected: UserType::class, actual: $type->from);
        $this->assertInstanceOf(expected: ChatType::class, actual: $type->chat);
        $this->assertInstanceOf(expected: \DateTimeImmutable::class, actual: $type->date);
        $this->assertInstanceOf(expected: \DateTimeImmutable::class, actual: $type->editDate);
    }

    /**
     * @throws ResponseException
     */
    public function testEncodeBool(): void
    {
        $result = true;

        $botApi = $this->getBot(result: $result);

        /** @var MessageType $type */
        $type = $botApi->call(method: $this->getMethod(), type: MessageType::class . '|bool');

        $this->assertIsBool(actual: $type);
    }
}
