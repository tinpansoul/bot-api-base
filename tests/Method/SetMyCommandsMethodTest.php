<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetMyCommandsMethod;
use TgBotApi\BotApiBase\Type\BotCommandType;

final class SetMyCommandsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'setMyCommands',
            request: [
                'commands' => [
                   [
                       'command' => '$command',
                       'description' => '$description',
                   ],
                    [
                        'command' => 'start',
                        'description' => 'start command description',
                    ],
                ],
            ],
            result: true,
            serialisedFields: ['commands']
        );

        $botApiComplete->setMyCommands(
            setMyCommandsMethod: SetMyCommandsMethod::create(commands: [
            BotCommandType::create(command: '$command', description: '$description'),
            BotCommandType::create(command: 'start', description: 'start command description'),
        ]));
    }
}
