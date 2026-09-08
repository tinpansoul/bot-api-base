<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;

/**
 * Class MediaGroupNormalizer.
 */
class MediaGroupNormalizer implements NormalizerInterface
{
    /**
     * MediaGroupNormalizer constructor.
     */
    public function __construct(
        private readonly InputMediaNormalizer $inputMediaNormalizer,
        private readonly NormalizerInterface $objectNormalizer,
    ) {
    }

    /**
     * @throws ExceptionInterface
     *
     * @return array|bool|float|int|mixed|string
     */
    public function normalize(
        mixed $topic,
        $format = null,
        array $context = [],
    ): string|int|float|bool|\ArrayObject|array|null {
        // Normalizers below rewrite fields into their JSON-serialized form. Work on a copy so the
        // caller's method object is left untouched and can be normalized again (e.g. on retry).
        $topic = clone $topic;

        $serializer = new Serializer(normalizers: [$this->inputMediaNormalizer, $this->objectNormalizer]);
        $topic->media = json_encode(value: $serializer->normalize(data: $topic->media, context: ['skip_null_values' => true]));

        return $serializer->normalize(data: $topic, context: ['skip_null_values' => true]);
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof SendMediaGroupMethod;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
