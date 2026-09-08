<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

/**
 * Class RichTextType.
 *
 * Represents rich formatted text. A value can be a plain string, an array of RichTextType, or any of the
 * concrete subclasses.
 *
 * @see https://core.telegram.org/bots/api#richtext
 */
abstract class RichTextType
{
    public const TYPE_ANCHOR = 'anchor';

    public const TYPE_ANCHOR_LINK = 'anchor_link';

    public const TYPE_BANK_CARD_NUMBER = 'bank_card_number';

    public const TYPE_BOLD = 'bold';

    public const TYPE_BOT_COMMAND = 'bot_command';

    public const TYPE_CASHTAG = 'cashtag';

    public const TYPE_CODE = 'code';

    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';

    public const TYPE_DATE_TIME = 'date_time';

    public const TYPE_EMAIL_ADDRESS = 'email_address';

    public const TYPE_HASHTAG = 'hashtag';

    public const TYPE_ITALIC = 'italic';

    public const TYPE_MARKED = 'marked';

    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';

    public const TYPE_MENTION = 'mention';

    public const TYPE_PHONE_NUMBER = 'phone_number';

    public const TYPE_REFERENCE = 'reference';

    public const TYPE_REFERENCE_LINK = 'reference_link';

    public const TYPE_SPOILER = 'spoiler';

    public const TYPE_STRIKETHROUGH = 'strikethrough';

    public const TYPE_SUBSCRIPT = 'subscript';

    public const TYPE_SUPERSCRIPT = 'superscript';

    public const TYPE_TEXT_MENTION = 'text_mention';

    public const TYPE_UNDERLINE = 'underline';

    public const TYPE_URL = 'url';

    /**
     * Type of the element, one of the TYPE_* constants.
     *
     * @var string
     */
    public $type;
}
