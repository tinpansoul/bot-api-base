<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\RichText;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class RichTextMathematicalExpressionType.
 *
 * A RichTextMathematicalExpression element.
 *
 * @see https://core.telegram.org/bots/api#richtextmathematicalexpression
 */
class RichTextMathematicalExpressionType extends RichTextType
{
    use FillFromArrayTrait;

    /**
     * The expression in LaTeX format.
     *
     * @var string
     */
    public $expression;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $expression, ?array $data = null): RichTextMathematicalExpressionType
    {
        $static = new static();
        $static->type = self::TYPE_MATHEMATICAL_EXPRESSION;
        $static->expression = $expression;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
