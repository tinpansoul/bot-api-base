<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;

/**
 * Class SendChatJoinRequestWebAppMethod.
 *
 * Use this method to send a Web App to a user in response to a chat join request query. Returns True on
 * success.
 *
 * @see https://core.telegram.org/bots/api#sendchatjoinrequestwebapp
 */
class SendChatJoinRequestWebAppMethod implements SendMethodAliasInterface
{
    /**
     * Unique identifier for the query to be answered.
     *
     * @var string
     */
    public $chatJoinRequestQueryId;

    /**
     * An HTTPS URL of a Web App to be opened.
     *
     * @var string
     */
    public $webAppUrl;

    public static function create(string $chatJoinRequestQueryId, string $webAppUrl): SendChatJoinRequestWebAppMethod
    {
        $static = new static();
        $static->chatJoinRequestQueryId = $chatJoinRequestQueryId;
        $static->webAppUrl = $webAppUrl;

        return $static;
    }
}
