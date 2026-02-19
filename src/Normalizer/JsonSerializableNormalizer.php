<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\ForceReplyType;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\MaskPositionType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardRemoveType;

/**
 * Class JsonSerializableNormalizer.
 */
class JsonSerializableNormalizer implements NormalizerInterface
{

    /**
     * JsonSerializableNormalizer constructor.
     */
    public function __construct(private readonly NormalizerInterface $objectNormalizer)
    {
    }

    /**
     *
     * @return string
     * @throws ExceptionInterface
     */
    public function normalize(
        mixed $topic,
        $format = null,
        array $context = []
    ): string|int|float|bool|\ArrayObject|array|null {
        $serializer = new Serializer(normalizers: [$this->objectNormalizer]);

        return \json_encode(value: $serializer->normalize(data: $topic, context: ['skip_null_values' => true]));
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof InlineKeyboardMarkupType ||
            $data instanceof ReplyKeyboardMarkupType ||
            $data instanceof ReplyKeyboardRemoveType ||
            $data instanceof MaskPositionType ||
            $data instanceof ForceReplyType;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
