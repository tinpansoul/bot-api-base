<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

final class SendContactMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendContact(sendContactMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot(methodName: 'sendContact', request: [
            'chat_id' => 'chat_id',
            'phone_number' => '+00000000000',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'vcard' => 'vcard_data',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'allow_sending_without_reply' => true,
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], result: [], serialisedFields: ['reply_markup']);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendContactMethod
    {
        return SendContactMethod::create(
            chatId: 'chat_id',
            phoneNumber: '+00000000000',
            firstName: 'first_name',
            data: [
                'lastName' => 'last_name',
                'vcard' => 'vcard_data',
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'allowSendingWithoutReply' => true,
                'replyMarkup' => $this->buildInlineMarkupObject(),
            ]
        );
    }
}
