<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Normalizer\AnswerInlineQueryNormalizer;
use TgBotApi\BotApiBase\Normalizer\EditMessageMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\EditMessageResponseNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputFileNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\InvoiceNormalizer;
use TgBotApi\BotApiBase\Normalizer\JsonSerializableNormalizer;
use TgBotApi\BotApiBase\Normalizer\LegacyObjectNormalizerWrapper;
use TgBotApi\BotApiBase\Normalizer\MediaGroupNormalizer;
use TgBotApi\BotApiBase\Normalizer\PollNormalizer;
use TgBotApi\BotApiBase\Normalizer\SetMyCommandsNormalizer;
use TgBotApi\BotApiBase\Normalizer\UserProfilePhotosNormalizer;
use TgBotApi\BotApiBase\Normalizer\SetChatMenuButtonNormalizer;

/**
 * Class BotApiNormalizer.
 */
class BotApiNormalizer implements NormalizerInterface
{
    /**
     * @param $data
     * @param $type
     *
     * @throws ExceptionInterface
     *
     * @return object|array|bool
     */
    public function denormalize($data, $type): mixed
    {
        $objectNormalizer = new ObjectNormalizer(
            classMetadataFactory: null,
            nameConverter: new CamelCaseToSnakeCaseNameConverter(),
            propertyAccessor: null,
            propertyTypeExtractor: new PhpDocExtractor()
        );
        $arrayDenormalizer = new ArrayDenormalizer();
        $dateTimeNormalizer = new DateTimeNormalizer();
        $serializer = new Serializer(normalizers: [
            new UserProfilePhotosNormalizer(objectNormalizer: $objectNormalizer, arrayDenormalizer: $arrayDenormalizer),
            new EditMessageResponseNormalizer(
                objectNormalizer: $objectNormalizer, arrayDenormalizer: $arrayDenormalizer,
                dateTimeNormalizer: $dateTimeNormalizer),
            new DateTimeNormalizer(),
            $dateTimeNormalizer,
            $objectNormalizer,
            $arrayDenormalizer,
        ]);

        return $serializer->denormalize(data: $data, type: $type, format: null, context: [DateTimeNormalizer::FORMAT_KEY => 'U']);
    }

    /**
     * @param $method
     *
     * @throws ExceptionInterface
     */
    public function normalize($method): BotApiRequestInterface
    {
        $isLegacy = !\defined(constant_name: AbstractObjectNormalizer::class . '::SKIP_NULL_VALUES');

        $files = [];

        $objectNormalizer = new ObjectNormalizer(classMetadataFactory: null, nameConverter: new CamelCaseToSnakeCaseNameConverter());
        if ($isLegacy) {
            $objectNormalizer = new LegacyObjectNormalizerWrapper(normalizer: $objectNormalizer);
        }

        $serializer = new Serializer(normalizers: [
            new PollNormalizer(objectNormalizer: $objectNormalizer),
            new InvoiceNormalizer(objectNormalizer: $objectNormalizer),
            new SetMyCommandsNormalizer(objectNormalizer: $objectNormalizer),
            new InputFileNormalizer(files: $files),
            new MediaGroupNormalizer(
                inputMediaNormalizer: new InputMediaNormalizer(objectNormalizer: $objectNormalizer, files: $files),
                objectNormalizer: $objectNormalizer),
            new EditMessageMediaNormalizer(
                inputMediaNormalizer: new InputMediaNormalizer(objectNormalizer: $objectNormalizer, files: $files),
                objectNormalizer: $objectNormalizer),
            new JsonSerializableNormalizer(objectNormalizer: $objectNormalizer),
            new AnswerInlineQueryNormalizer(objectNormalizer: $objectNormalizer),
            new SetChatMenuButtonNormalizer(objectNormalizer: $objectNormalizer),
            new DateTimeNormalizer(),
            $objectNormalizer,
        ]);

        $data = $serializer->normalize(
            data: $method,
            format: null,
            context: [
                'skip_null_values' => true,
                DateTimeNormalizer::FORMAT_KEY => 'U',
            ]
        );

        return new BotApiRequest(data: $data, files: $files);
    }
}
