<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Class UserProfilePhotosNormalizer.
 */
class EditMessageResponseNormalizer implements DenormalizerInterface
{

    /**
     * UserProfilePhotosNormalizer constructor.
     */
    public function __construct(
        private readonly NormalizerInterface $objectNormalizer,
        private readonly ArrayDenormalizer $arrayDenormalizer,
        private readonly DateTimeNormalizer $dateTimeNormalizer
    ) {
    }

    /**
     *
     * @return MessageType | bool
     * @throws ExceptionInterface
     *
     */
    public function denormalize(mixed $data, string $class, $format = null, array $context = []): mixed
    {
        if (\is_bool(value: $data)) {
            return $data;
        }

        $serializer = new Serializer(normalizers: [$this->dateTimeNormalizer, $this->objectNormalizer, $this->arrayDenormalizer]);

        return $serializer->denormalize(data: $data, type: MessageType::class, format: $format, context: $context);
    }

    public function supportsDenormalization(mixed $data, string $type, $format = null, array $context = []): bool
    {
        return MessageType::class . '|bool' === $type;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
