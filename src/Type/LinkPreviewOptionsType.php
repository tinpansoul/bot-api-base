<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class LinkPreviewOptionsType.
 *
 * Describes the options used for link preview generation.
 * Replaces the deprecated disable_web_page_preview field.
 *
 * @see https://core.telegram.org/bots/api#linkpreviewoptions
 */
class LinkPreviewOptionsType
{
    /**
     * Optional. True, if the link preview is disabled.
     *
     * @var bool|null
     */
    public $isDisabled;

    /**
     * Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used.
     *
     * @var string|null
     */
    public $url;

    /**
     * Optional. True, if the media in the link preview is supposed to be shrunk.
     *
     * @var bool|null
     */
    public $preferSmallMedia;

    /**
     * Optional. True, if the media in the link preview is supposed to be enlarged.
     *
     * @var bool|null
     */
    public $preferLargeMedia;

    /**
     * Optional. True, if the link preview must be shown above the message text.
     *
     * @var bool|null
     */
    public $showAboveText;

    public static function create(?bool $isDisabled = null): LinkPreviewOptionsType
    {
        $static = new static();
        $static->isDisabled = $isDisabled;

        return $static;
    }
}
