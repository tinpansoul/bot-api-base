<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SendDiceMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

final class SendDiceMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    public function testCreate(): void
    {
        $datasets = $this->dataProvider();

        foreach ($datasets as $dataset) {
            $this->assertMethod(...$dataset);
        }
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @param array<string, mixed[]|bool|int|string> $data
     */
    public function testEncode(SendDiceMethod $sendDiceMethod, array $data): void
    {
        $botApiComplete = $this->getBot(methodName: 'sendDice', request: $data, serialisedFields: ['reply_markup']);

        $botApiComplete->sendDice(sendDiceMethod: $sendDiceMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                SendDiceMethod::createWithDice(
                    chatId: 'chat_id',
                    data: [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                $this->getApiRequest(emoji: SendDiceMethod::EMOJI_DICE),
            ],
            [
                SendDiceMethod::createWithDarts(
                    chatId: 'chat_id',
                    data: [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                $this->getApiRequest(emoji: SendDiceMethod::EMOJI_DARTS),
            ],
            [
                SendDiceMethod::createWithBasketball(
                    chatId: 'chat_id',
                    data: [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                $this->getApiRequest(emoji: SendDiceMethod::EMOJI_BASKETBALL),
            ],
            [
                SendDiceMethod::createWithFootBall(
                    chatId: 'chat_id',
                    data: [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                $this->getApiRequest(emoji: SendDiceMethod::EMOJI_FOOTBALL),
            ],
            [
                SendDiceMethod::createWithSlotMachine(
                    chatId: 'chat_id',
                    data: [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => self::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                $this->getApiRequest(emoji: SendDiceMethod::EMOJI_SLOT_MACHINE),
            ],
        ];
    }

    /**
     * @return array<string, string|mixed[]|bool|int>
     */
    private function getApiRequest(string $emoji): array
    {
        return [
            'chat_id' => 'chat_id',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'emoji' => $emoji,
            'allow_sending_without_reply' => true,
            'reply_markup' => self::buildInlineMarkupArray(),
        ];
    }

    /**
     * @param array<string, mixed> $data
     */
    private function assertMethod(SendDiceMethod $sendDiceMethod, array $data): void
    {
        self::assertEquals(expected: $data['allow_sending_without_reply'], actual: $sendDiceMethod->allowSendingWithoutReply);
        self::assertInstanceOf(expected: InlineKeyboardMarkupType::class, actual: $sendDiceMethod->replyMarkup);
        self::assertEquals(expected: 'chat_id', actual: $sendDiceMethod->chatId);
        self::assertEquals(expected: 1, actual: $sendDiceMethod->replyToMessageId);
        self::assertEquals(expected: $data['emoji'], actual: $sendDiceMethod->emoji);
    }
}
