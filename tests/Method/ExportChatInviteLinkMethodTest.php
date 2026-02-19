<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;

final class ExportChatInviteLinkMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'exportChatInviteLink', request: ['chat_id' => 1], result: 'link');

        $botApiComplete->exportChatInviteLink(exportChatInviteLinkMethod: ExportChatInviteLinkMethod::create(chatId: 1));
    }
}
