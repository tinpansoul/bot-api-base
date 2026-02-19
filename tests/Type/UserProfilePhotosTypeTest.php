<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\PhotoSizeType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;

final class UserProfilePhotosTypeTest extends TypeTestCase
{
    public function testEncode(): void
    {
        $result = self::getResource(filename: 'user-profile-photos');

        $userProfilePhotosType = $this->getType(result: $result);

        $result = \json_decode(json: $result, associative: true)['result'];

        $this->assertEquals(expected: $userProfilePhotosType->totalCount, actual: $result['total_count']);
        $this->assertEquals(expected: \count($userProfilePhotosType->photos), actual: 1);
        $this->assertEquals(expected: \count($userProfilePhotosType->photos[0]), actual: 3);

        foreach ($result['photos'][0] as $index => $size) {
            $this->assertInstanceOf(expected: PhotoSizeType::class, actual: $userProfilePhotosType->photos[0][$index]);
            $this->assertEquals(expected: $userProfilePhotosType->photos[0][$index]->fileId, actual: $size['file_id']);
            $this->assertEquals(expected: $userProfilePhotosType->photos[0][$index]->fileUniqueId, actual: $size['file_unique_id']);
            $this->assertEquals(expected: $userProfilePhotosType->photos[0][$index]->fileSize, actual: $size['file_size']);
            $this->assertEquals(expected: $userProfilePhotosType->photos[0][$index]->width, actual: $size['width']);
            $this->assertEquals(expected: $userProfilePhotosType->photos[0][$index]->height, actual: $size['height']);
        }
    }

    public function getType(string $result): UserProfilePhotosType
    {
        $botApi = $this->getBotFromJson(json: $result);

        return $botApi->call(method: $this->getMethod(), type: UserProfilePhotosType::class);
    }
}
