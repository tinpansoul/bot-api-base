<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\InputMessageContent\InputLocationMessageContentType;

final class InputLocationMessageContentTypeTest extends TypeBaseTestCase
{
    public function testCreate(): void
    {
        $inputLocationMessageContentType = InputLocationMessageContentType::create(latitude: 1.3, longitude: 1.3, data: [
            'horizontalAccuracy' => 200.5,
            'livePeriod' => 20,
            'heading' => 30,
            'proximityAlertRadius' => 40,
        ]);

        self::assertEquals(expected: 200.5, actual: $inputLocationMessageContentType->horizontalAccuracy);
        self::assertEquals(expected: 20, actual: $inputLocationMessageContentType->livePeriod);
        self::assertEquals(expected: 30, actual: $inputLocationMessageContentType->heading);
        self::assertEquals(expected: 40, actual: $inputLocationMessageContentType->proximityAlertRadius);
        self::assertEquals(expected: 1.3, actual: $inputLocationMessageContentType->latitude);
        self::assertEquals(expected: 1.3, actual: $inputLocationMessageContentType->longitude);
    }

    /**
     * @return array<string, array<int, string|InputLocationMessageContentType>>
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                InputLocationMessageContentType::class,
                self::getResource(filename: 'InputLocationContentType/default'),
                $this->getType(),
            ],
            'with redundant variables' => [
                InputLocationMessageContentType::class,
                self::getResource(filename: 'InputLocationContentType/default_with_extended_keys'),
                $this->getType(),
            ],
        ];
    }

    private function getType(): InputLocationMessageContentType
    {
        $inputLocationMessageContentType = new InputLocationMessageContentType();

        $inputLocationMessageContentType->latitude = 1.3;
        $inputLocationMessageContentType->longitude = 1.3;
        $inputLocationMessageContentType->horizontalAccuracy = 200.5;
        $inputLocationMessageContentType->livePeriod = 20;
        $inputLocationMessageContentType->heading = 30;
        $inputLocationMessageContentType->proximityAlertRadius = 40;

        return $inputLocationMessageContentType;
    }
}
