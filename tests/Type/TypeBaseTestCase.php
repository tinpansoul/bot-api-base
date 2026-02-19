<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use PHPUnit\Framework\MockObject\MockObject;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\Tests\GetNormalizerTrait;

abstract class TypeBaseTestCase extends TypeTestCase
{
    use GetNormalizerTrait;

    private BotApi $botApi;

    private MockObject|ApiClientInterface $client;

    protected function setUp(): void
    {
        $this->client = $this->getMockBuilder(className: ApiClientInterface::class)
            ->getMock();

        $this->botApi = new BotApi(
            botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
            apiClient: $this->client,
            normalizer: $this->getNormalizer()
        );
    }

    /**
     * @dataProvider provideData
     *
     * @param mixed $excepted
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testType(string $class, string $response, array $excepted): void
    {
        $this->client
            ->expects(static::once())
            ->method(constraint: 'send')
            ->willReturn(value: \json_decode(json: $response));

        $type = $this->botApi->call(method: $this->getMethod(), type: $class);

        if ($excepted instanceof $class) {
            static::assertEquals(expected: $excepted, actual: $type);
        } else {
            foreach (\get_object_vars(object: $type) as $var => $value) {
                static::assertEquals(expected: $excepted[$var], actual: $value);
            }
        }
    }

    abstract public function provideData(): array;
}
