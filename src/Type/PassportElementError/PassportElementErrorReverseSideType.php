<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

/**
 * Class PassportElementErrorReverseSideType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
class PassportElementErrorReverseSideType extends PassportElementErrorType
{
    const TYPE_DRIVER_LICENSE = 'driver_license';

    const TYPE_IDENTITY_CARD = 'identity_card';

    const ALLOWED_TYPES = [
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
    ];

    /**
     * Base64-encoded hash of the file with the reverse side of the document.
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
    ): PassportElementErrorReverseSideType {
        $instance = parent::createBase(source: 'reverse_side', type: $type, message: $message);
        $instance->fileHash = $fileHash;

        return $instance;
    }
}
