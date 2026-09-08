<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputRichBlock;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputRichBlockMathematicalExpressionType.
 *
 * A InputRichBlockMathematicalExpression element.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmathematicalexpression
 */
class InputRichBlockMathematicalExpressionType extends InputRichBlockType
{
    use FillFromArrayTrait;

    /**
     * The mathematical expression in LaTeX format.
     *
     * @var string
     */
    public $expression;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $expression, ?array $data = null): InputRichBlockMathematicalExpressionType
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
