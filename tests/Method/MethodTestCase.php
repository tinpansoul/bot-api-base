<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\BotApiRequestInterface;
use TgBotApi\BotApiBase\Tests\GetNormalizerTrait;

abstract class MethodTestCase extends \PHPUnit\Framework\TestCase
{
    use GetNormalizerTrait;

    protected function getBot($methodName, $request, bool|string|array|int|object $result = [], array $serialisedFields = []): BotApiComplete
    {
        $stub = $this->getMockBuilder(className: ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method(constraint: 'send')
            ->with(
                $methodName,
                $this->callback(callback: function (BotApiRequestInterface $botApiRequest) use ($request, $serialisedFields): true {
                    $query = $botApiRequest->getData();
                    foreach ($serialisedFields as $serialisedField) {
                        $query[$serialisedField] = \json_decode(json: (string) $query[$serialisedField], associative: true);
                    }

                    $this->assertEquals(expected: $request, actual: $query);

                    return true;
                })
            )
            ->willReturn(value: (object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApiComplete(botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', apiClient: $stub, normalizer: $this->getNormalizer());
    }

    /**
     * @param       $methodName
     * @param       $request
     */
    protected function getBotWithFiles(
        $methodName,
        $request,
        array $fileMap,
        array $serializableFields = [],
        bool|array $result = []
    ): BotApiComplete {
        $stub = $this->getMockBuilder(className: ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method(constraint: 'send')
            ->with(
                $methodName,
                $this->callback(
                    callback: function (BotApiRequestInterface $botApiRequest) use ($request, $fileMap, $serializableFields): true {
                        $request = $this->buildFileTree(files: $botApiRequest->getFiles(), request: $request, map: $fileMap);
                        $data = $botApiRequest->getData();
                        foreach ($serializableFields as $serializableField) {
                            $this->assertIsString(actual: $data[$serializableField]);
                            $data[$serializableField] = \json_decode(json: $data[$serializableField], associative: true);
                        }

                        $this->assertEquals(expected: $request, actual: $data);

                        return true;
                    }
                )
            )
            ->willReturn(value: (object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApiComplete(botKey: '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', apiClient: $stub, normalizer: $this->getNormalizer());
    }

    private function buildFileTree(array $files, array &$request, array $map, int &$pointer = 0): array
    {
        foreach ($map as $key => $field) {
            if (\is_array(value: $field)) {
                $request[$key] = $this->buildFileTree(files: $files, request: $request[$key], map: $field, pointer: $pointer);
            } else {
                $request[$key] = 'attach://' . \array_keys(array: $files)[$pointer];
                ++$pointer;
            }
        }

        return $request;
    }
}
