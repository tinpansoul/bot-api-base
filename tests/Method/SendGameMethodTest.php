<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendGameMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;

final class SendGameMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;
    use ReplyKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendGame(sendGameMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot(methodName: 'sendGame', request: [
            'chat_id' => 1,
            'game_short_name' => 'game_short_name',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => self::buildInlineMarkupArray(),
            'allow_sending_without_reply' => true,
        ], result: [], serialisedFields: ['reply_markup']);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendGameMethod
    {
        return SendGameMethod::create(
            chatId: 1,
            gameShortName: 'game_short_name',
            data: [
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
