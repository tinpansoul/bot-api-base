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
     * @throws ExceptionInterface
     *
     * @return array|bool|false|float|int|string
     */
    public function normalize(
        $topic,
        $format = null,
        array $context = [],
    ): string|int|float|bool|\ArrayObject|array|null {
        // Normalizers below rewrite fields into their JSON-serialized form. Work on a copy so the
        // caller's method object is left untouched and can be normalized again (e.g. on retry).
        $topic = clone $topic;

        $serializer = new Serializer(normalizers: [
            new JsonSerializableNormalizer(objectNormalizer: $this->objectNormalizer),
            $this->objectNormalizer,
        ]);

        $topic->commands = json_encode(
            value: $serializer->normalize(data: $topic->commands, context: ['skip_null_values' => true])
        );

        return $serializer->normalize(data: $topic, context: ['skip_null_values' => true]);
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
