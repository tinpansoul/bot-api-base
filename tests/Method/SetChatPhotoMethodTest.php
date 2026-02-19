<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatPhotoMethod;
use TgBotApi\BotApiBase\Type\InputFileType;

final class SetChatPhotoMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBotWithFiles(
            methodName: 'setChatPhoto',
            request: ['chat_id' => 'chat_id', 'photo' => ''],
            fileMap: ['photo' => true],
            serializableFields: [],
            result: true
        );

        $botApiComplete->setChatPhoto(
            setChatPhotoMethod: SetChatPhotoMethod::create(
            chatId: 'chat_id',
            inputFileType: InputFileType::create(path: '/dev/null')
        ));
    }
}
