<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

/**
 * Class PassportElementErrorFrontSideType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfrontside
 */
class PassportElementErrorFrontSideType extends PassportElementErrorType
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
     * Base64-encoded hash of the file with the front side of the document.
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
    ): PassportElementErrorFrontSideType {
        $instance = parent::createBase(source: 'front_side', type: $type, message: $message);
        $instance->fileHash = $fileHash;

        return $instance;
    }
}
