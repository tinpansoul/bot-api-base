<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

/**
 * Class PassportElementErrorSelfieType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorselfie
 */
class PassportElementErrorSelfieType extends PassportElementErrorType
{
    const TYPE_PASSPORT = 'passport';

    const TYPE_DRIVER_LICENSE = 'driver_license';

    const TYPE_IDENTITY_CARD = 'identity_card';

    const TYPE_INTERNAL_PASSPORT = 'internal_passport';

    const ALLOWED_TYPES = [
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNAL_PASSPORT,
    ];

    /**
     * Base64-encoded hash of the file with the selfie.
     *
     * @var string
     */
    public $fileHash;

    /**
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(
        string $type,
        string $message,
        string $fileHash
    ): PassportElementErrorSelfieType {
        $instance = parent::createBase(source: 'selfie', type: $type, message: $message);
        $instance->fileHash = $fileHash;

        return $instance;
    }
}
