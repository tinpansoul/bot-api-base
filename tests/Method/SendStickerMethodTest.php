<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendStickerMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendStickerMethodTest.
 */
final class SendStickerMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendSticker(sendStickerMethod: $this->getMethod());
        $this->getApi()->send(sendMethodAlias: $this->getMethod());

        $this->getApiWithStringFileId()->sendSticker(sendStickerMethod: $this->getMethodWithStringFileId());
        $this->getApiWithStringFileId()->send(sendMethodAlias: $this->getMethodWithStringFileId());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            methodName: 'sendSticker',
            request: [
                'chat_id' => 'chat_id',
                'sticker' => '',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => self::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            fileMap: ['sticker' => true],
            serializableFields: ['reply_markup']
        );
    }

    private function getApiWithStringFileId(): BotApiComplete
    {
        return $this->getBot(
            methodName: 'sendSticker',
            request: [
                'chat_id' => 'chat_id',
                'sticker' => 'file_id',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => self::buildInlineMarkupArray(),
            ],
            result: [],
            serialisedFields: ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendStickerMethod
    {
        return SendStickerMethod::create(
            chatId: 'chat_id',
            sticker: InputFileType::create(path: '/dev/null'),
            data: [
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethodWithStringFileId(): SendStickerMethod
    {
        return SendStickerMethod::create(
            chatId: 'chat_id',
            sticker: 'file_id',
            data: [
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => self::buildInlineMarkupObject(),
            ]
        );
    }
}
