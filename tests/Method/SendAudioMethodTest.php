<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

final class SendAudioMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendAudio(sendAudioMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'sendAudio',
            request: [
                'chat_id' => 'chat_id',
                'audio' => '',
                'duration' => 100,
                'performer' => 'performer',
                'title' => 'title',
                'thumb' => '',
                'caption' => 'caption',
                'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'allow_sending_without_reply' => true,
                'reply_markup' => self::buildInlineMarkupArray(),
            ],
            fileMap: ['audio' => true, 'thumb' => true],
            serializableFields: ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendAudioMethod
    {
        return SendAudioMethod::create(
            chatId: 'chat_id',
            audio: InputFileType::create(path: '/dev/null'),
            data: [
                'duration' => 100,
                'performer' => 'performer',
                'title' => 'title',
                'thumb' => InputFileType::create(path: '/dev/null'),
                'caption' => 'caption',
                'captionEntities' => [MessageEntityType::create(type: MessageEntityType::TYPE_PRE, offset: 0, length: 1)],
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'allowSendingWithoutReply' => true,
                'replyMarkup' => self::buildInlineMarkupObject(),
            ]
        );
    }
}
