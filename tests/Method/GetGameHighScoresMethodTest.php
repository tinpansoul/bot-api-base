<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetGameHighScoresMethod;

final class GetGameHighScoresMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getGameHighScores', request: ['user_id' => 1, 'chat_id' => 1, 'message_id' => 1]);

        $botApiComplete->getGameHighScores(getGameHighScoresMethod: GetGameHighScoresMethod::create(userId: 1, chatId: 1, messageId: 1));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline(): void
    {
        $botApiComplete = $this->getBot(methodName: 'getGameHighScores', request: ['user_id' => 1, 'inline_message_id' => 'message_id']);

        $botApiComplete->getGameHighScores(getGameHighScoresMethod: GetGameHighScoresMethod::createInline(userId: 1, inlineMessageId: 'message_id'));
    }
}
