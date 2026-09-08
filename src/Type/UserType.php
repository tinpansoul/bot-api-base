<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class UserType.
 *
 * @see https://core.telegram.org/bots/api#user
 */
class UserType
{
    /**
     * Unique identifier for this user or bot.
     *
     * @var int
     */
    public $id;

    /**
     * True, if this user is a bot.
     *
     * @var bool
     */
    public $isBot;

    /**
     * User‘s or bot’s first name.
     *
     * @var string
     */
    public $firstName;

    /**
     * Optional. User‘s or bot’s last name.
     *
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. User‘s or bot’s username.
     *
     * @var string|null
     */
    public $username;

    /**
     * Optional. IETF language tag of the user's language.
     *
     * @var string|null
     */
    public $languageCode;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe.
     *
     * @var bool|null
     */
    public $canJoinGroups;

    /**
     * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     *
     * @var bool|null
     */
    public $canReadAllGroupMessages;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe.
     *
     * @var bool|null
     */
    public $supportsInlineQueries;

    /**
     * Optional. True, if this user is a Telegram Premium user
     *
     * @var bool|null
     */
    public $isPremium;

    /**
     * Optional. True, if this user added the bot to the attachment menu
     *
     * @var bool|null
     */
    public $addedToAttachmentMenu;

    /**
     * Optional. True, if the bot supports guest queries from chats it is not a member of. Returned only in getMe.
     *
     * @var bool|null
     */
    public $supportsGuestQueries;

    /**
     * Optional. True, if the bot can be connected to a user account to manage it. Returned only in getMe.
     *
     * @var bool|null
     */
    public $canConnectToBusiness;

    /**
     * Optional. True, if the bot has a main Web App. Returned only in getMe.
     *
     * @var bool|null
     */
    public $hasMainWebApp;

    /**
     * Optional. True, if the bot has forum topic mode enabled in private chats. Returned only in getMe.
     *
     * @var bool|null
     */
    public $hasTopicsEnabled;

    /**
     * Optional. True, if the bot allows users to create and delete topics in private chats. Returned only in getMe.
     *
     * @var bool|null
     */
    public $allowsUsersToCreateTopics;

    /**
     * Optional. True, if other bots can be created to be controlled by the bot. Returned only in getMe.
     *
     * @var bool|null
     */
    public $canManageBots;

    /**
     * Optional. True, if the bot supports join request queries and can be assigned to process them. Returned only in
     * getMe.
     *
     * @var bool|null
     */
    public $supportsJoinRequestQueries;
}
