<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

/**
 * Class PassportElementErrorDataFieldType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrordatafield
 */
class PassportElementErrorDataFieldType extends PassportElementErrorType
{
    public const TYPE_PERSONAL_DETAILS = 'personal_details';

    public const TYPE_PASSPORT = 'passport';

    public const TYPE_DRIVER_LICENSE = 'driver_license';

    public const TYPE_IDENTITY_CARD = 'identity_card';

    public const TYPE_INTERNAL_PASSPORT = 'internal_passport';

    public const TYPE_ADDRESS = 'address';

    public const ALLOWED_TYPES = [
        self::TYPE_PERSONAL_DETAILS,
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNAL_PASSPORT,
        self::TYPE_ADDRESS,
    ];

    /**
     * Name of the data field which has the error.
     *
     * @var string
     */
    public $fieldName;

    /**
     * Base64-encoded data hash.
     *
     * @var string
     */
    public $dataHash;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $type,
        string $message,
        string $fieldName,
        string $dataHash,
    ): PassportElementErrorDataFieldType {
        $instance = parent::createBase(source: 'data', type: $type, message: $message);
        $instance->fieldName = $fieldName;
        $instance->dataHash = $dataHash;

        return $instance;
    }
}
