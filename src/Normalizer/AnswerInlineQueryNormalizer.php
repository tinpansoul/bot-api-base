<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;

/**
 * Class AnswerInlineQueryNormalizer.
 */
class AnswerInlineQueryNormalizer implements NormalizerInterface
{

    /**
     * AnswerInlineQueryNormalizer constructor.
     */
    public function __construct(private readonly NormalizerInterface $objectNormalizer)
    {
    }

    /**
     * @return array|bool|float|int|mixed|string
     */
    public function normalize(mixed $topic, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
    {
        $serializer = new Serializer(normalizers: [new DateTimeNormalizer(), $this->objectNormalizer]);

        $topic->results = \json_encode(
            value: $serializer->normalize(
            data: $topic->results,
            format: null,
            context: ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        ));

        return $serializer->normalize(
            data: $topic,
            format: null,
            context: ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        );
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof AnswerInlineQueryMethod;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
