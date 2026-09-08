<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextDateTimeType.
 *
 * A RichTextDateTime element.
 *
 * @see https://core.telegram.org/bots/api#richtextdatetime
 */
class RichTextDateTimeType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The text.
     *
     * @var string|RichTextType|RichTextType[]
     */
    public $text;

    /**
     * The Unix time associated with the entity.
     *
     * @var int
     */
    public $unixTime;

    /**
     * The string that defines the formatting of the date and time. See date-time entity formatting for more
     * details.
     *
     * @var string
     */
    public $dateTimeFormat;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string|RichTextType|array $text, int $unixTime, string $dateTimeFormat, ?array $data = null): RichTextDateTimeType
    {
        $static = new static();
        $static->type = self::TYPE_DATE_TIME;
        $static->text = $text;
        $static->unixTime = $unixTime;
        $static->dateTimeFormat = $dateTimeFormat;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
