<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\SendInvoiceMethod;

class InvoiceNormalizer implements NormalizerInterface
{

    /**
     * JsonSerializableNormalizer constructor.
     */
    public function __construct(private readonly NormalizerInterface $objectNormalizer)
    {
    }

    /**
     * @param SendInvoiceMethod $topic
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

        $topic->prices = \json_encode(value: $serializer->normalize(data: $topic->prices, context: ['skip_null_values' => true]));

        return $serializer->normalize(data: $topic, context: ['skip_null_values' => true]);
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof SendInvoiceMethod;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
