<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputFileNormalizer.
 */
class InputFileNormalizer implements NormalizerInterface
{
    /**
     * @var
     */
    private ?array $files = null;

    /**
     * InputFileNormalizer constructor.
     *
     * @param $files
     */
    public function __construct(&$files)
    {
        $this->files = &$files;
    }

    /**
     * @return array|bool|float|int|string
     */
    public function normalize(
        mixed $topic,
        $format = null,
        array $context = []
    ): string|int|float|bool|\ArrayObject|array|null {
        $uniqid = \uniqid(more_entropy: true);

        $this->files[$uniqid] = $topic;

        return 'attach://' . $uniqid;
    }

    public function supportsNormalization(mixed $data, $format = null, array $context = []): bool
    {
        return $data instanceof InputFileType;
    }

    /**
     * @return array<string, bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
