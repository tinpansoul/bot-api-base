<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMessageContent;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputContactMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
class InputContactMessageContentType extends InputMessageContentType
{
    use FillFromArrayTrait;

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
        string $phoneNumber,
        string $firstName,
        array $data = null
    ): InputContactMessageContentType {
        $static = new static();
        $static->phoneNumber = $phoneNumber;
        $static->firstName = $firstName;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
