<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InlineQueryResultGameType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgame
 */
class InlineQueryResultGameType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * Short name of the game.
     *
     * @var string
     */
    public $gameShortName;

    /**
     * @param array|null $data
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     */
    public static function create(string $id, string $gameShortName, array $data = null): InlineQueryResultGameType
    {
        $static = new static();
        $static->type = static::TYPE_GAME;
        $static->id = $id;
        $static->gameShortName = $gameShortName;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
