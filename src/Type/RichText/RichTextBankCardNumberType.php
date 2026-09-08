<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextBankCardNumberType.
 *
 * A RichTextBankCardNumber element.
 *
 * @see https://core.telegram.org/bots/api#richtextbankcardnumber
 */
class RichTextBankCardNumberType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The bank card number.
     *
     * @var string
     */
    public $bankCardNumber;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, string $bankCardNumber, ?array $data = null): RichTextBankCardNumberType
    {
        $static = new static();
        $static->type = self::TYPE_BANK_CARD_NUMBER;
        $static->text = $text;
        $static->bankCardNumber = $bankCardNumber;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
