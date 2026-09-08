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
        // Normalizers below rewrite fields into their JSON-serialized form. Work on a copy so the
        // caller's method object is left untouched and can be normalized again (e.g. on retry).
        $topic = clone $topic;

        if ($topic->media instanceof InputFileType) {
            $uniqid = \uniqid(more_entropy: true);
            $this->files[$uniqid] = $topic->media;
            $topic->media = 'attach://' . $uniqid;
        }

        // Bot API 6.6 renamed "thumb" to "thumbnail". Fold the deprecated field into the current
        // one so anything still setting $thumb keeps working; skip_null_values drops the old key.
        if (\property_exists(object_or_class: $topic, property: 'thumb')
            && \property_exists(object_or_class: $topic, property: 'thumbnail')) {
            if (null !== $topic->thumb && null === $topic->thumbnail) {
                $topic->thumbnail = $topic->thumb;
            }

            $topic->thumb = null;
        }

        if (\property_exists(object_or_class: $topic, property: 'thumbnail') && $topic->thumbnail instanceof InputFileType) {
            $uniqid = \uniqid(more_entropy: true);
            $this->files[$uniqid] = $topic->thumbnail;
            $topic->thumbnail = 'attach://' . $uniqid;
        }

        $serializer = new Serializer(normalizers: [$this->objectNormalizer]);

        return $serializer->normalize(data: $topic, context: ['skip_null_values' => true]);
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
