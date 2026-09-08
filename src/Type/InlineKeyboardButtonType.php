<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InlineKeyboardButtonType.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButtonType
{
    use FillFromArrayTrait;

    /**
     * Label text on the button.
     *
     * @var string
     */
    public $text;

    /**
     * Optional. HTTP or tg:// url to be opened when button is pressed.
     *
     * @var string|null
     */
    public $url;

    /**
     * Optional. An HTTP URL used to automatically authorize the user.
     * Can be used as a replacement for the Telegram Login Widget.
     *
     * @var LoginUrlType|null
     */
    public $loginUrl;

    /**
     * Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes.
     *
     * @var string|null
     */
    public $callbackData;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and
     * insert the bot‘s username and the specified inline query in the input field.
     * Can be empty, in which case just the bot’s username will be inserted.
     *
     * Note: This offers an easy way for users to start using your bot in inline mode when they are currently in a
     * private chat with it. Especially useful when combined with switch_pm… actions – in this case the user
     * will be automatically returned to the chat they switched from, skipping the chat selection screen.
     *
     * @var string|null
     */
    public $switchInlineQuery;

    /**
     * Optional. If set, pressing the button will insert the bot‘s username and the specified inline query in the
     * current chat's input field. Can be empty, in which case only the bot’s username will be inserted.
     *
     * This offers a quick way for the user to open your bot in inline mode in the same chat – good for selecting
     * something from multiple options.
     *
     * @var string|null
     */
    public $switchInlineQueryCurrentChat;

    /**
     * Optional. Description of the game that will be launched when the user presses the button.
     *
     * NOTE: This type of button must always be the first button in the first row.
     *
     * @var CallbackGameType|null
     */
    public $callbackGame;

    /**
     * Specify True, to send a Pay button.
     *
     * NOTE: This type of button must always be the first button in the first row.
     *
     * @var bool|null
     */
    public $pay;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button.
     * The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
     * Available only in private chats between a user and the bot.
     *
     * @var WebAppInfoType|null
     */
    public $webApp;

    /**
     * Optional. Unique identifier of the custom emoji shown before the text of the button. Can only be used by bots
     * that purchased additional usernames on Fragment or in the messages directly sent by the bot to private, group
     * and supergroup chats if the owner of the bot has a Telegram Premium subscription.
     *
     * @var string|null
     */
    public $iconCustomEmojiId;

    /**
     * Optional. Style of the button. Must be one of “danger” (red), “success” (green) or “primary” (blue).
     * If omitted, then an app-specific style is used.
     *
     * @var string|null
     */
    public $style;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $text, ?array $data = null): InlineKeyboardButtonType
    {
        $static = new static();
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
