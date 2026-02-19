<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Method\SendLocationMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Method\SendVideoMethod;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Method\SendVoiceMethod;
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;

final class ApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetUpdates(): void
    {
        $getUpdatesMethod = GetUpdatesMethod::create();

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getUpdatesMethod), $this->equalTo(value: UpdateType::class . '[]'))
            ->willReturn(value: []);

        /* @var BotApiComplete $bot */
        $mockObject->getUpdates($getUpdatesMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetMe(): void
    {
        $getMeMethod = GetMeMethod::create();

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getMeMethod), $this->equalTo(value: UserType::class))
            ->willReturn(value: new UserType());

        /* @var BotApiComplete $bot */
        $mockObject->getMe($getMeMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendMessage(): void
    {
        $sendMessageMethod = SendMessageMethod::create(chatId: 'id', text: 'text');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendMessageMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendMessage($sendMessageMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testforwardMessage(): void
    {
        $forwardMessageMethod = ForwardMessageMethod::create(chatId: 'id', fromChatId: 'id', messageId: 1);

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $forwardMessageMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->forwardMessage($forwardMessageMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendPhoto(): void
    {
        $sendPhotoMethod = SendPhotoMethod::create(chatId: 'id', photo: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendPhotoMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendPhoto($sendPhotoMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendAudio(): void
    {
        $sendAudioMethod = SendAudioMethod::create(chatId: 'id', audio: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendAudioMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendAudio($sendAudioMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendDocument(): void
    {
        $sendDocumentMethod = SendDocumentMethod::create(chatId: 'id', document: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendDocumentMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendDocument($sendDocumentMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendVideo(): void
    {
        $sendVideoMethod = SendVideoMethod::create(chatId: 'id', video: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendVideoMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendVideo($sendVideoMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendAnimation(): void
    {
        $sendAnimationMethod = SendAnimationMethod::create(chatId: 'id', animation: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendAnimationMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendAnimation($sendAnimationMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendVoice(): void
    {
        $sendVoiceMethod = SendVoiceMethod::create(chatId: 'id', voice: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendVoiceMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendVoice($sendVoiceMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendVideoNote(): void
    {
        $sendVideoNoteMethod = SendVideoNoteMethod::create(chatId: 'id', videoNote: 'url');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendVideoNoteMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendVideoNote($sendVideoNoteMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendMediaGroup(): void
    {
        $sendMediaGroupMethod = SendMediaGroupMethod::create(chatId: 'id', media: []);

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendMediaGroupMethod), $this->equalTo(value: MessageType::class . '[]'))
            ->willReturn(value: []);

        /* @var BotApiComplete $bot */
        $mockObject->sendMediaGroup($sendMediaGroupMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendLocation(): void
    {
        $sendLocationMethod = SendLocationMethod::create(chatId: 'id', latitude: 0.1, longitude: 0.1);

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendLocationMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendLocation($sendLocationMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendVenue(): void
    {
        $sendVenueMethod = SendVenueMethod::create(chatId: 'id', latitude: 0.1, longitude: 0.1, title: 'title', address: 'address');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendVenueMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendVenue($sendVenueMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testSendContact(): void
    {
        $sendContactMethod = SendContactMethod::create(chatId: 'id', phoneNumber: 'phone number', firstName: 'first name');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $sendContactMethod), $this->equalTo(value: MessageType::class))
            ->willReturn(value: new MessageType());

        /* @var BotApiComplete $bot */
        $mockObject->sendContact($sendContactMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetUserProfilePhotos(): void
    {
        $getUserProfilePhotosMethod = GetUserProfilePhotosMethod::create(userId: 1);

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getUserProfilePhotosMethod), $this->equalTo(value: UserProfilePhotosType::class))
            ->willReturn(value: new UserProfilePhotosType());

        /* @var BotApiComplete $bot */
        $mockObject->getUserProfilePhotos($getUserProfilePhotosMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetFile(): void
    {
        $getFileMethod = GetFileMethod::create(fileId: 'id');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getFileMethod), $this->equalTo(value: FileType::class))
            ->willReturn(value: new FileType());

        /* @var BotApiComplete $bot */
        $mockObject->getFile($getFileMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetChat(): void
    {
        $getChatMethod = GetChatMethod::create(chatId: 'id');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getChatMethod), $this->equalTo(value: ChatType::class))
            ->willReturn(value: new ChatType());

        /* @var BotApiComplete $bot */
        $mockObject->getChat($getChatMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetChatAdministrators(): void
    {
        $getChatAdministratorsMethod = GetChatAdministratorsMethod::create(chatId: 'id');

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getChatAdministratorsMethod), $this->equalTo(value: ChatMemberType::class . '[]'))
            ->willReturn(value: []);

        /* @var BotApiComplete $bot */
        $mockObject->getChatAdministrators($getChatAdministratorsMethod);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testGetChatMember(): void
    {
        $getChatMemberMethod = GetChatMemberMethod::create(chatId: 'id', userId: 1);

        $mockObject = $this->getBotMock();
        $mockObject->expects($this->once())
            ->method(constraint: 'call')
            ->with($this->equalTo(value: $getChatMemberMethod), $this->equalTo(value: ChatMemberType::class))
            ->willReturn(value: new ChatMemberType());

        /* @var BotApiComplete $bot */
        $mockObject->getChatMember($getChatMemberMethod);
    }

    private function getBotMock(): \PHPUnit\Framework\MockObject\MockObject
    {
        return $this->getMockBuilder(className: BotApiComplete::class)
            ->disableOriginalConstructor()
            ->setMethods(methods: ['call'])
            ->getMock();
    }
}
