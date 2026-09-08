<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class InlineQueryResultsButtonType.
 *
 * Represents a button to be shown above inline query results.
 * Replaces the deprecated switch_pm_text and switch_pm_parameter fields.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultsbutton
 */
class InlineQueryResultsButtonType
{
    /**
     * Label text on the button.
     *
     * @var string
     */
    public $text;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button.
     *
     * @var WebAppInfoType|null
     */
    public $webApp;

    /**
     * Optional. Deep-linking parameter for the /start message sent to the bot when a user presses the button.
     * 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.
     *
     * @var string|null
     */
    public $startParameter;

    public static function create(string $text): InlineQueryResultsButtonType
    {
        $static = new static();
        $static->text = $text;

        return $static;
    }
}
