<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

final class SendVideoNoteMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendVideoNote(sendVideoNoteMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'sendVideoNote',
            request: [
                'chat_id' => 'chat_id',
                'video_note' => '',
                'duration' => 100,
                'thumb' => '',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => self::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            fileMap: ['video_note' => true, 'thumb' => true],
            serializableFields: ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendVideoNoteMethod
    {
        return SendVideoNoteMethod::create(
            chatId: 'chat_id',
            videoNote: InputFileType::create(path: '/dev/null'),
            data: [
                'duration' => 100,
                'thumb' => InputFileType::create(path: '/dev/null'),
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
