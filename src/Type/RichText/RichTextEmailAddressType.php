<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextEmailAddressType.
 *
 * A RichTextEmailAddress element.
 *
 * @see https://core.telegram.org/bots/api#richtextemailaddress
 */
class RichTextEmailAddressType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The email address.
     *
     * @var string
     */
    public $emailAddress;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $emailAddress, ?array $data = null): RichTextEmailAddressType
    {
        $static = new static();
        $static->type = self::TYPE_EMAIL_ADDRESS;
        $static->text = $text;
        $static->emailAddress = $emailAddress;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
