<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class BotCommandScopeType.
 *
 * Represents the scope to which bot commands are applied. The Bot API models this as a union
 * of seven objects that differ only in which of chatId and userId they carry, so a single
 * class with the discriminating type constant covers all of them.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope
 */
class BotCommandScopeType
{
    public const TYPE_DEFAULT = 'default';

    public const TYPE_ALL_PRIVATE_CHATS = 'all_private_chats';

    public const TYPE_ALL_GROUP_CHATS = 'all_group_chats';

    public const TYPE_ALL_CHAT_ADMINISTRATORS = 'all_chat_administrators';

    public const TYPE_CHAT = 'chat';

    public const TYPE_CHAT_ADMINISTRATORS = 'chat_administrators';

    public const TYPE_CHAT_MEMBER = 'chat_member';

    /**
     * Scope type, one of the TYPE_* constants.
     *
     * @var string
     */
    public $type;

    /**
     * Optional. Unique identifier for the target chat or username of the target supergroup.
     * Required for the "chat", "chat_administrators" and "chat_member" scopes.
     *
     * @var int|string|null
     */
    public $chatId;

    /**
     * Optional. Unique identifier of the target user. Required for the "chat_member" scope.
     *
     * @var int|null
     */
    public $userId;

    public static function create(string $type = self::TYPE_DEFAULT): BotCommandScopeType
    {
        $static = new static();
        $static->type = $type;

        return $static;
    }

    public static function createForChat(int|string $chatId, string $type = self::TYPE_CHAT): BotCommandScopeType
    {
        $static = new static();
        $static->type = $type;
        $static->chatId = $chatId;

        return $static;
    }

    public static function createForChatMember(int|string $chatId, int $userId): BotCommandScopeType
    {
        $static = new static();
        $static->type = self::TYPE_CHAT_MEMBER;
        $static->chatId = $chatId;
        $static->userId = $userId;

        return $static;
    }
}
