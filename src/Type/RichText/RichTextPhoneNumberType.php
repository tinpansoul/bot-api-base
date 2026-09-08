<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextPhoneNumberType.
 *
 * A RichTextPhoneNumber element.
 *
 * @see https://core.telegram.org/bots/api#richtextphonenumber
 */
class RichTextPhoneNumberType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The phone number.
     *
     * @var string
     */
    public $phoneNumber;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $phoneNumber, ?array $data = null): RichTextPhoneNumberType
    {
        $static = new static();
        $static->type = self::TYPE_PHONE_NUMBER;
        $static->text = $text;
        $static->phoneNumber = $phoneNumber;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
