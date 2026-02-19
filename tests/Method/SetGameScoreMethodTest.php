<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetGameScoreMethod;

final class SetGameScoreMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setGameScore',
            request: [
                'chat_id' => 1,
                'user_id' => 1,
                'score' => 100,
                'message_id' => 1,
                'force' => true,
                'disable_edit_message' => true,
            ],
            result: true
        );

        $botApiComplete->setGameScore(
            setGameScoreMethod: SetGameScoreMethod::create(
            userId: 1,
            score: 100,
            chatId: 1,
            messageId: 1,
            data: [
                'force' => true,
                'disableEditMessage' => true,
            ]
        ));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setGameScore',
            request: [
                'user_id' => 1,
                'score' => 100,
                'inline_message_id' => 'id',
                'force' => true,
                'disable_edit_message' => true,
            ],
            result: true
        );

        $botApiComplete->setGameScore(
            setGameScoreMethod: SetGameScoreMethod::createInline(
            userId: 1,
            score: 100,
            inlineMessageId: 'id',
            data: [
                'force' => true,
                'disableEditMessage' => true,
            ]
        ));
    }
}
