<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

/**
 * Class SendMessageMethodTest.
 */
final class SendMessageMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendMessage(sendMessageMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot(methodName: 'sendMessage', request: [
            'text' => 'test',
            'parse_mode' => 'HTML',
            'chat_id' => '1',
            'disable_web_page_preview' => true,
            'disable_notification' => true,
            'entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
            'reply_to_message_id' => 1,
            'allow_sending_without_reply' => true,
            'reply_markup' => '{"inline_keyboard":[]}',
        ]);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendMessageMethod
    {
        return SendMessageMethod::create(chatId: '1', text: 'test', data: [
            'parseMode' => HasParseModeVariableInterface::PARSE_MODE_HTML,
            'disableWebPagePreview' => true,
            'disableNotification' => true,
            'replyToMessageId' => 1,
            'replyMarkup' => InlineKeyboardMarkupType::create(inlineKeyboard: []),
            'allowSendingWithoutReply' => true,
            'entities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
        ]);
    }
}
