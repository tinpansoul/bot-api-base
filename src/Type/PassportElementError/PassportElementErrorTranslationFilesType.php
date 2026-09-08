<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

/**
 * Class PassportElementErrorTranslationFilesType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
class PassportElementErrorTranslationFilesType extends PassportElementErrorType
{
    public const TYPE_PASSPORT = 'passport';

    public const TYPE_DRIVER_LICENSE = 'driver_license';

    public const TYPE_IDENTITY_CARD = 'identity_card';

    public const TYPE_INTERNAL_PASSPORT = 'internal_passport';

    public const TYPE_UTILITY_BILL = 'utility_bill';

    public const TYPE_BANK_STATEMENT = 'bank_statement';

    public const TYPE_RENTAL_AGREEMENT = 'rental_agreement';

    public const TYPE_PASSPORT_REGISTRATION = 'passport_registration';

    public const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';

    public const ALLOWED_TYPES = [
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNAL_PASSPORT,
        self::TYPE_UTILITY_BILL,
        self::TYPE_BANK_STATEMENT,
        self::TYPE_RENTAL_AGREEMENT,
        self::TYPE_PASSPORT_REGISTRATION,
        self::TYPE_TEMPORARY_REGISTRATION,
    ];

    /**
     * List of base64-encoded file hashes.
     *
     * @var string[]
     */
    public $fileHashes;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $type,
        string $message,
        array $fileHashes,
    ): PassportElementErrorTranslationFilesType {
        $instance = parent::createBase(source: 'translation_files', type: $type, message: $message);
        $instance->fileHashes = $fileHashes;

        return $instance;
    }
}
