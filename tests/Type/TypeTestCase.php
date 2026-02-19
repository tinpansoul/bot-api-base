<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Tests\GetNormalizerTrait;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\WebhookFetcher;

abstract class TypeTestCase extends \PHPUnit\Framework\TestCase
{
    use GetNormalizerTrait;

    /**
     * @return BotApi
     */
    public function getBotFromJson(string $json)
    {
        $stub = $this->getMockBuilder(className: ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method(constraint: 'send')
            ->willReturn(value: \json_decode(json: $json, associative: false));

        return new BotApi(botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', apiClient: $stub, normalizer: $this->getNormalizer());
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadRequestException
     */
    public function getFetchedResult(string $json): UpdateType
    {
        return (new WebhookFetcher(normalizer: $this->getNormalizer()))->fetch(request: $json);
    }

    /**
     * @param $result
     */
    protected function getBot($result): BotApi
    {
        $stub = $this->getMockBuilder(className: ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method(constraint: 'send')
            ->willReturn(value: (object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApi(botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', apiClient: $stub, normalizer: $this->getNormalizer());
    }

    protected function getMethod(): MethodInterface
    {
        return $this->getMockBuilder(className: MethodInterface::class)->getMock();
    }

    protected static function getResource($filename): string
    {
        return \file_get_contents(filename: \sprintf('%s/resources/%s.json', __DIR__, $filename));
    }
}
