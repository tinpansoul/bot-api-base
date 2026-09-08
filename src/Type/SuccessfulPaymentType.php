<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class SuccessfulPaymentType.
 *
 * @see https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPaymentType
{
    /**
     * Three-letter ISO 4217 currency code.
     *
     * @var string
     */
    public $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145.
     * See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @see https://core.telegram.org/bots/payments#supported-currencies
     * @see https://core.telegram.org/bots/payments/currencies.json
     *
     * @var int
     */
    public $totalAmount;

    /**
     * Bot specified invoice payload.
     *
     * @var string
     */
    public $invoicePayload;

    /**
     * Telegram payment identifier.
     *
     * @var string
     */
    public $telegramPaymentChargeId;

    /**
     * Provider payment identifier.
     *
     * @var string
     */
    public $providerPaymentChargeId;

    /**
     * Optional. Identifier of the shipping option chosen by the user.
     *
     * @var string|null
     */
    public $shippingOptionId;

    /**
     * Optional. Order info provided by the user.
     *
     * @var OrderInfoType|null
     */
    public $orderInfo;

    /**
     * Optional. Expiration date of the subscription, in Unix time; for recurring payments only.
     *
     * @var \DateTimeImmutable|null
     */
    public $subscriptionExpirationDate;

    /**
     * Optional. True, if the payment is a recurring payment for a subscription.
     *
     * @var bool|null
     */
    public $isRecurring;

    /**
     * Optional. True, if the payment is the first payment for a subscription.
     *
     * @var bool|null
     */
    public $isFirstRecurring;
}
