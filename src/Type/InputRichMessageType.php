<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Type\InputRichBlock\InputRichBlockType;

/**
 * Class InputRichMessageType.
 *
 * Describes the content of a rich message. Exactly one of blocks, html or markdown must be set.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessage
 */
class InputRichMessageType
{
    /**
     * Optional. The content as a list of blocks.
     *
     * @var InputRichBlockType[]|null
     */
    public $blocks;

    /**
     * Optional. The content in HTML format.
     *
     * @var string|null
     */
    public $html;

    /**
     * Optional. The content in Markdown format.
     *
     * @var string|null
     */
    public $markdown;

    /**
     * Optional. Media referenced from the content.
     *
     * @var InputRichMessageMediaType[]|null
     */
    public $media;

    /**
     * Optional. Pass True if the message must be shown right-to-left.
     *
     * @var bool|null
     */
    public $isRtl;

    /**
     * Optional. Pass True to skip automatic detection of entities such as links and mentions.
     *
     * @var bool|null
     */
    public $skipEntityDetection;

    public static function createFromHtml(string $html): InputRichMessageType
    {
        $static = new static();
        $static->html = $html;

        return $static;
    }

    public static function createFromMarkdown(string $markdown): InputRichMessageType
    {
        $static = new static();
        $static->markdown = $markdown;

        return $static;
    }

    public static function createFromBlocks(array $blocks): InputRichMessageType
    {
        $static = new static();
        $static->blocks = $blocks;

        return $static;
    }
}
