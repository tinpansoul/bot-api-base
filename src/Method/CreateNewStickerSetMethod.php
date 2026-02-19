<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EmojisVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MaskPositionType;

/**
 * Class CreateNewStickerSetMethod.
 *
 * @see https://core.telegram.org/bots/api#createnewstickerset
 */
class CreateNewStickerSetMethod implements CreateMethodAliasInterface
{
    use FillFromArrayTrait;
    use EmojisVariableTrait;

    /**
     * User identifier of created sticker set owner.
     *
     * @var int
     */
    public $userId;

    /**
     * Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals).
     * Can contain only english letters, digits and underscores.
     * Must begin with a letter, can't contain consecutive underscores and must end in “_by_<bot username>”.
     * <bot_username> is case insensitive. 1-64 characters.
     *
     * @var string
     */
    public $name;

    /**
     * Sticker set title, 1-64 characters.
     *
     * @var string
     */
    public $title;

    /**
     * Optional. Png image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px,
     * and either width or height must be exactly 512px.
     * Pass a file_id as a String to send a file that already exists on the Telegram servers,
     * pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * or upload a new one using multipart/form-data.
     *
     * @var InputFileType|string|null
     */
    public $pngSticker;

    /**
     * Optional. TGS animation with the sticker, uploaded using multipart/form-data.
     * See https://core.telegram.org/animated_stickers#technical-requirements for technical requirements.
     *
     * @var InputFileType|null
     */
    public $tgsSticker;

    /**
     * Optional. Pass True, if a set of mask stickers should be created.
     *
     * @var bool|null
     */
    public $containsMasks;

    /**
     * Optional. A JSON-serialized object for position where the mask should be placed on faces.
     *
     * @var MaskPositionType|null
     */
    public $maskPosition;

    /**
     * CreateNewStickerSetMethod constructor.
     *
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @deprecated
     * @see CreateNewStickerSetMethod::createStatic()
     */
    public static function create(
        int $userId,
        string $name,
        string $title,
        string|InputFileType $pngSticker,
        string $emojis,
        array $data = null
    ): CreateNewStickerSetMethod {
        return static::createStatic(userId: $userId, name: $name, title: $title, pngSticker: $pngSticker, emojis: $emojis, data: $data);
    }

    /**
     * CreateNewStickerSetMethod constructor.
     *
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function createStatic(
        int $userId,
        string $name,
        string $title,
        string|InputFileType $pngSticker,
        string $emojis,
        array $data = null
    ): CreateNewStickerSetMethod {
        $createNewStickerSetMethod = self::createBase(userId: $userId, name: $name, title: $title, emojis: $emojis, data: $data);
        $createNewStickerSetMethod->pngSticker = $pngSticker;

        return $createNewStickerSetMethod;
    }

    /**
     * CreateNewStickerSetMethod constructor.
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function createAnimated(
        int $userId,
        string $name,
        string $title,
        InputFileType $inputFileType,
        string $emojis,
        array $data = null
    ): CreateNewStickerSetMethod {
        $createNewStickerSetMethod = self::createBase(userId: $userId, name: $name, title: $title, emojis: $emojis, data: $data);
        $createNewStickerSetMethod->tgsSticker = $inputFileType;

        return $createNewStickerSetMethod;
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private static function createBase(
        int $userId,
        string $name,
        string $title,
        string $emojis,
        array $data = null
    ): CreateNewStickerSetMethod {
        $static = new static();
        $static->userId = $userId;
        $static->name = $name;
        $static->title = $title;
        $static->emojis = $emojis;

        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
