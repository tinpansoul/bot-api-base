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
        private readonly NormalizerInterface $objectNormalizer
    ) {
    }

    /**
     *
     * @return array|bool|float|int|mixed|string
     * @throws ExceptionInterface
     *
     */
    public function normalize(
        mixed $topic,
        $format = null,
        array $context = []
    ): string|int|float|bool|\ArrayObject|array|null {
        $serializer = new Serializer(normalizers: [$this->inputMediaNormalizer, $this->objectNormalizer]);
        $topic->media = \json_encode(value: $serializer->normalize(data: $topic->media, format: null, context: ['skip_null_values' => true]));

        return $serializer->normalize(data: $topic, format: null, context: ['skip_null_values' => true]);
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
