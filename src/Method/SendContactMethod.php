<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendContactMethod.
 *
 * @see https://core.telegram.org/bots/api#sendcontact
 */
class SendContactMethod implements SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Contact's phone number.
     *
     * @var string
     */
    public $phoneNumber;

    /**
     * Contact's first name.
     *
     * @var string
     */
    public $firstName;

    /**
     * Optional. Contact's last name.
     *
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes.
     *
     * @var string|null
     */
    public $vcard;

    /**
     * @param array|null $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(
        int|string $chatId,
        string $phoneNumber,
        string $firstName,
        array $data = null
    ): SendContactMethod {
        $static = new static();
        $static->chatId = $chatId;
        $static->phoneNumber = $phoneNumber;
        $static->firstName = $firstName;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
