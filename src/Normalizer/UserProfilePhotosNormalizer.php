<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\PhotoSizeType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;

/**
 * Class UserProfilePhotosNormalizer.
 */
class UserProfilePhotosNormalizer implements DenormalizerInterface
{

    /**
     * UserProfilePhotosNormalizer constructor.
     */
    public function __construct(
        private readonly NormalizerInterface $objectNormalizer,
        private readonly ArrayDenormalizer $arrayDenormalizer
    ) {
    }

    /**
     *
     * @throws ExceptionInterface
     */
    public function denormalize(mixed $data, string $class, $format = null, array $context = []): UserProfilePhotosType
    {
        $serializer = new Serializer(normalizers: [$this->objectNormalizer, $this->arrayDenormalizer]);
        $data->photos = $serializer->denormalize(data: $data->photos, type: PhotoSizeType::class . '[][]');

        return $serializer->denormalize(data: $data, type: UserProfilePhotosType::class);
    }

    public function supportsDenormalization(mixed $data, string $type, $format = null, array $context = []): bool
    {
        return UserProfilePhotosType::class === $type;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
