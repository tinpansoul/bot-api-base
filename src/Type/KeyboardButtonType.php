<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\Poll\KeyboardButtonPollType;

/**
 * Class KeyboardButtonType
 * Note: request_contact and request_location options will only work in Telegram versions released after 9
 * April, 2016. Older clients will ignore them.
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButtonType
{
    use FillFromArrayTrait;

    /**
     * Text of the button. If none of the optional fields are used,
     * it will be sent as a message when the button is pressed.
     *
     * @var string
     */
    public $text;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only.
     *
     * @var bool|null
     */
    public $requestContact;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only.
     *
     * @var bool|null
     */
    public $requestLocation;

    /**
     * Optional. If specified, the user will be asked to create a poll
     * and send it to the bot when the button is pressed. Available in private chats only.
     *
     * @var KeyboardButtonPollType
     */
    public $requestPoll;

    /**
     * Optional. If specified, the described Web App will be launched when the button is pressed.
     * The Web App will be able to send a “web_app_data” service message. Available in private chats only.
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
     * @throws BadArgumentException
     */
    public static function create(string $text, ?array $data = null): KeyboardButtonType
    {
        $static = new static();
        $static->text = $text;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
