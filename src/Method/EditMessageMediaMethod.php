<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaType;

/**
 * Class EditMessageMediaMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagemedia
 */
class EditMessageMediaMethod implements EditMethodAliasInterface
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * A JSON-serialized object for a new media content of the message.
     *
     * @var InputMediaType
     */
    public $media;

    /**
     * @param array|null     $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(
        int|string $chatId,
        int $messageId,
        InputMediaType $inputMediaType,
        array $data = null
    ): EditMessageMediaMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->media = $inputMediaType;
        $static->messageId = $messageId;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId', 'media', 'messageId', 'caption']);
        }

        return $static;
    }

    /**
     * @param array|null     $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function createInline(
        string $inlineMessageId,
        InputMediaType $inputMediaType,
        array $data = null
    ): EditMessageMediaMethod {
        $static = new static();
        $static->inlineMessageId = $inlineMessageId;
        $static->media = $inputMediaType;
        if ($data) {
            $static->fill(data: $data, forbidden: ['chatId', 'media', 'messageId', 'caption']);
        }

        return $static;
    }
}
