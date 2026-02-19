<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\MessageEntityType;
use TgBotApi\BotApiBase\Type\UserType;

final class MessageEntityTypeTest extends TypeBaseTestCase
{
    public function testCreate(): void
    {
        $messageEntityType = MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 1, length: 5, data: [
            'url' => 'url',
            'user' => new UserType(),
            'language' => 'json',
        ]);

        self::assertEquals(expected: 'pre', actual: $messageEntityType->type);
        self::assertEquals(expected: 1, actual: $messageEntityType->offset);
        self::assertEquals(expected: 5, actual: $messageEntityType->length);
        self::assertEquals(expected: 'url', actual: $messageEntityType->url);
        self::assertEquals(expected: new UserType(), actual: $messageEntityType->user);
        self::assertEquals(expected: 'json', actual: $messageEntityType->language);
    }

    /**
     * @return array<string, array<int, string|MessageEntityType>>
     */
    public function provideData(): array
    {
        return [
            'all fields case' => [
                MessageEntityType::class,
                self::getResource(filename: 'MessageEntityTypeTest/all-fields'),
                (array) MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 1, length: 5, data: [
                    'url' => 'url',
                    'user' => new UserType(),
                    'language' => 'json',
                ]),
            ],
        ];
    }
}
