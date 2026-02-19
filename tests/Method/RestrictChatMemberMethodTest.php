<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;
use TgBotApi\BotApiBase\Type\ChatPermissionsType;

final class RestrictChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \Exception
     */
    public function testEncodeOld(): void
    {
        $dateTime = new \DateTimeImmutable();
        $botApiComplete = $this->getBot(methodName: 'restrictChatMember', request: [
            'chat_id' => 'chat_id',
            'user_id' => 1,
            'until_date' => $dateTime->format(format: 'U'),
            'can_send_messages' => true,
            'can_send_media_messages' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
        ], result: true);

        $botApiComplete->restrictChatMember(
            restrictChatMemberMethod: RestrictChatMemberMethod::createOld(chatId: 'chat_id', userId: 1, data: [
            'untilDate' => $dateTime,
            'canSendMessages' => true,
            'canSendMediaMessages' => true,
            'canSendOtherMessages' => true,
            'canAddWebPagePreviews' => true,
        ]));
    }

    public function testEncode(): void
    {
        $dateTime = new \DateTimeImmutable();
        $botApiComplete = $this->getBot(methodName: 'restrictChatMember', request: [
            'chat_id' => 'chat_id',
            'user_id' => 1,
            'until_date' => $dateTime->format(format: 'U'),
            'permissions' => [
                'can_send_messages' => true,
                'can_send_media_messages' => true,
                'can_send_polls' => true,
                'can_send_other_messages' => true,
                'can_add_web_page_previews' => true,
                'can_change_info' => true,
                'can_invite_users' => true,
                'can_pin_messages' => true,
            ], ], result: true);

        $chatPermissionsType = ChatPermissionsType::create(data: [
            'canAddWebPagePreviews' => true,
            'canChangeInfo' => true,
            'canInviteUsers' => true,
            'canPinMessages' => true,
            'canSendMediaMessages' => true,
            'canSendMessages' => true,
            'canSendOtherMessages' => true,
            'canSendPolls' => true,
        ]);

        $botApiComplete->restrictChatMember(
            restrictChatMemberMethod: RestrictChatMemberMethod::create(
            chatId: 'chat_id',
            userId: 1,
            chatPermissionsType: $chatPermissionsType, data: [
            'untilDate' => $dateTime,
        ]));
    }
}
