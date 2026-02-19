<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AnswerCallbackQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerPreCheckoutQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerShippingQueryMethod;
use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;

/**
 * Trait AnswerMethodTrait.
 */
trait AnswerMethodTrait
{
    /**
     *
     * @throws ResponseException
     *
     */
    abstract public function answer(AnswerMethodAliasInterface $answerMethodAlias): bool;

    /**
     *
     * @throws ResponseException
     *
     */
    public function answerCallbackQuery(AnswerCallbackQueryMethod $answerCallbackQueryMethod): bool
    {
        return $this->answer(answerMethodAlias: $answerCallbackQueryMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function answerInlineQuery(AnswerInlineQueryMethod $answerInlineQueryMethod): bool
    {
        return $this->answer(answerMethodAlias: $answerInlineQueryMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function answerPreCheckoutQuery(AnswerPreCheckoutQueryMethod $answerPreCheckoutQueryMethod): bool
    {
        return $this->answer(answerMethodAlias: $answerPreCheckoutQueryMethod);
    }

    /**
     *
     * @throws ResponseException
     *
     */
    public function answerShippingQuery(AnswerShippingQueryMethod $answerShippingQueryMethod): bool
    {
        return $this->answer(answerMethodAlias: $answerShippingQueryMethod);
    }
}
