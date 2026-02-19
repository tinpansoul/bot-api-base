<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;

final class GetUserProfilePhotosMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $botApiComplete = $this->getBot(
            methodName: 'getUserProfilePhotos',
            request: ['user_id' => 1, 'offset' => 0, 'limit' => 100],
            result: (object) ['total_count' => 1, 'photos' => []]
        );

        $botApiComplete->getUserProfilePhotos(getUserProfilePhotosMethod: GetUserProfilePhotosMethod::create(userId: 1, data: ['offset' => 0, 'limit' => 100]));
    }
}
