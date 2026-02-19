<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\PromoteChatMemberMethod;

/**
 * Class PromoteChatMemberMethodTest.
 */
final class PromoteChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'promoteChatMember', request: [
            'chat_id' => 'chat_id',
            'user_id' => 1,
            'can_change_info' => true,
            'can_post_messages' => true,
            'can_edit_messages' => true,
            'can_delete_messages' => true,
            'can_invite_users' => true,
            'can_restrict_members' => true,
            'can_pin_messages' => true,
            'can_promote_members' => true,
            'is_anonymous' => true,
        ], result: true);

        $promoteChatMemberMethod = PromoteChatMemberMethod::create(chatId: 'chat_id', userId: 1, data: ['canChangeInfo' => true]);
        $promoteChatMemberMethod->canPostMessages = true;
        $promoteChatMemberMethod->canEditMessages = true;
        $promoteChatMemberMethod->canDeleteMessages = true;
        $promoteChatMemberMethod->canInviteUsers = true;
        $promoteChatMemberMethod->canRestrictMembers = true;
        $promoteChatMemberMethod->canPinMessages = true;
        $promoteChatMemberMethod->canPromoteMembers = true;
        $promoteChatMemberMethod->isAnonymous = true;

        $botApiComplete->promoteChatMember(promoteChatMemberMethod: $promoteChatMemberMethod);
    }
}
