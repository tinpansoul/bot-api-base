<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

final class SendPhotoMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendPhoto(sendPhotoMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'sendPhoto',
            request: [
                'chat_id' => 'chat_id',
                'photo' => 'photo',
                'caption' => 'caption',
                'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => self::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            fileMap: ['photo' => true],
            serializableFields: ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendPhotoMethod
    {
        return SendPhotoMethod::create(
            chatId: 'chat_id',
            photo: InputFileType::create(path: '/dev/null'),
            data: [
                'caption' => 'caption',
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'captionEntities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
