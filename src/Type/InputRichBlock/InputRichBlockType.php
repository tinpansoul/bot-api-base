<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

/**
 * Class InputRichBlockType.
 *
 * Represents a block in a rich formatted message to be sent. Use one of the concrete subclasses.
 *
 * @see https://core.telegram.org/bots/api#inputrichblock
 */
abstract class InputRichBlockType
{
    public const TYPE_ANCHOR = 'anchor';

    public const TYPE_ANIMATION = 'animation';

    public const TYPE_AUDIO = 'audio';

    public const TYPE_BLOCKQUOTE = 'blockquote';

    public const TYPE_COLLAGE = 'collage';

    public const TYPE_DETAILS = 'details';

    public const TYPE_DIVIDER = 'divider';

    public const TYPE_FOOTER = 'footer';

    public const TYPE_LIST = 'list';

    public const TYPE_MAP = 'map';

    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';

    public const TYPE_PARAGRAPH = 'paragraph';

    public const TYPE_PHOTO = 'photo';

    public const TYPE_PRE = 'pre';

    public const TYPE_PULLQUOTE = 'pullquote';

    public const TYPE_HEADING = 'heading';

    public const TYPE_SLIDESHOW = 'slideshow';

    public const TYPE_TABLE = 'table';

    public const TYPE_THINKING = 'thinking';

    public const TYPE_VIDEO = 'video';

    public const TYPE_VOICE_NOTE = 'voice_note';

    /**
     * Type of the element, one of the TYPE_* constants.
     *
     * @var string
     */
    public $type;
}
