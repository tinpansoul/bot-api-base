<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;

/**
 * Class OtherTest.
 */
final class OtherTest extends TestCase
{
    /**
     * @throws BadArgumentException
     */
    public function testFillFromArrayTraitWrongValue(): void
    {
        $this->expectException(exception: BadArgumentException::class);
        SetChatDescriptionMethod::create(chatId: 'chat_id', data: ['wrongField' => 'wrongValue']);
    }

    /**
     * @throws BadArgumentException
     */
    public function testFillFromArrayTraitForbiddenValue(): void
    {
        $this->expectException(exception: BadArgumentException::class);
        SetChatDescriptionMethod::create(chatId: 'chat_id', data: ['chatId' => 'forbidden']);
    }
}
