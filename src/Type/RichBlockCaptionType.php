<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\RichText\RichTextType;

/**
 * Class RichBlockCaptionType.
 *
 * Describes the caption of a rich message block.
 *
 * @see https://core.telegram.org/bots/api#richblockcaption
 */
class RichBlockCaptionType
{
    use FillFromArrayTrait;

    /**
     * Block caption.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * Optional. Block credit which corresponds to the HTML tag <cite>.
     *
     * @var string|RichTextType|RichTextType[]|null
     */
    public $credit;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, ?array $data = null): RichBlockCaptionType
    {
        $static = new static();
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
