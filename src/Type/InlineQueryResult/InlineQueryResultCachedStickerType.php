<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultCachedStickerType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 */
class InlineQueryResultCachedStickerType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * A valid file identifier of the sticker.
     *
     * @var string
     */
    public $stickerFileId;

    /**
     * Optional. Content of the message to be sent instead of the sticker.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @param array|null $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(
        string $id,
        string $stickerFileId,
        array $data = null
    ): InlineQueryResultCachedStickerType {
        $static = new static();
        $static->type = static::TYPE_STICKER;
        $static->id = $id;
        $static->stickerFileId = $stickerFileId;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
