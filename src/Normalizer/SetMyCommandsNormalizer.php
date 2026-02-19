<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\SetMyCommandsMethod;

class SetMyCommandsNormalizer implements NormalizerInterface
{

    /**
     * JsonSerializableNormalizer constructor.
     */
    public function __construct(private readonly NormalizerInterface $objectNormalizer)
    {
    }

    /**
     * @param SetMyCommandsMethod $topic
     *
     * @return array|bool|false|float|int|string
     * @throws ExceptionInterface
     */
    public function normalize(
        $topic,
        $format = null,
        array $context = []
    ): string|int|float|bool|\ArrayObject|array|null {
        $serializer = new Serializer(normalizers: [
            new JsonSerializableNormalizer(objectNormalizer: $this->objectNormalizer),
            $this->objectNormalizer,
        ]);

        $topic->commands = \json_encode(value: $topic->commands);

        return $serializer->normalize(data: $topic, format: null, context: ['skip_null_values' => true]);
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof SetMyCommandsMethod;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
