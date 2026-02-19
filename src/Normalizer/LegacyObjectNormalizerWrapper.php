<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

class LegacyObjectNormalizerWrapper implements NormalizerInterface, SerializerAwareInterface
{

    public function __construct(private readonly AbstractNormalizer $normalizer)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(
        $object,
        $format = null,
        array $context = []
    ): string|int|float|bool|\ArrayObject|array|null {
        $data = $this->normalizer->normalize(data: $object, format: $format, context: $context);

        return \array_filter(array: $data, callback: static fn($value): bool => null !== $value);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return $this->normalizer->supportsNormalization(data: $data, format: $format);
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->normalizer->setSerializer(serializer: $serializer);
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
