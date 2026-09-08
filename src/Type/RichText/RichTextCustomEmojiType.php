<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextCustomEmojiType.
 *
 * A RichTextCustomEmoji element.
 *
 * @see https://core.telegram.org/bots/api#richtextcustomemoji
 */
class RichTextCustomEmojiType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * Unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker.
     *
     * @var string
     */
    public $customEmojiId;

    /**
     * Alternative emoji for the custom emoji.
     *
     * @var string
     */
    public $alternativeText;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $customEmojiId, string $alternativeText, ?array $data = null): RichTextCustomEmojiType
    {
        $static = new static();
        $static->type = self::TYPE_CUSTOM_EMOJI;
        $static->customEmojiId = $customEmojiId;
        $static->alternativeText = $alternativeText;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
