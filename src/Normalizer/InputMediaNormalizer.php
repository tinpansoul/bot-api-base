<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaType;

/**
 * Class InputMediaNormalizer.
 */
class InputMediaNormalizer implements NormalizerInterface
{
    /**
     * @var
     */
    private ?array $files = null;

    /**
     * InputMediaNormalizer constructor.
     *
     * @param $files
     */
    public function __construct(private readonly NormalizerInterface $objectNormalizer, &$files)
    {
        $this->files = &$files;
    }

    /**
     * @param InputMediaType $topic
     *
     * @return array|bool|float|int|mixed|string
     * @throws ExceptionInterface
     */
    public function normalize(
        $topic,
        $format = null,
        array $context = []
    ): string|int|float|bool|\ArrayObject|array|null {
        if ($topic->media instanceof InputFileType) {
            $uniqid = \uniqid(prefix: '', more_entropy: true);
            $this->files[$uniqid] = $topic->media;
            $topic->media = 'attach://' . $uniqid;
        }

        if (\property_exists(object_or_class: $topic, property: 'thumb') && $topic->thumb instanceof InputFileType) {
            $uniqid = \uniqid(prefix: '', more_entropy: true);
            $this->files[$uniqid] = $topic->thumb;
            $topic->thumb = 'attach://' . $uniqid;
        }

        $serializer = new Serializer(normalizers: [$this->objectNormalizer]);

        return $serializer->normalize(data: $topic, format: null, context: ['skip_null_values' => true]);
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof InputMediaType;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
