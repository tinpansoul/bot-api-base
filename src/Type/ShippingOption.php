<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ShippingOption.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption
{
    /**
     * Shipping option identifier.
     *
     * @var string
     */
    public $id;

    /**
     * Option title.
     *
     * @var string
     */
    public $title;

    /**
     * List of price portions.
     *
     * @var LabeledPriceType[]
     */
    public $prices;

    public static function create(string $id, string $title, array $prices): ShippingOption
    {
        $static = new static();
        $static->id = $id;
        $static->title = $title;
        $static->prices = $prices;

        return $static;
    }

    public function addPrice(LabeledPriceType $labeledPriceType): ShippingOption
    {
        $this->prices[] = $labeledPriceType;

        return $this;
    }
}
