<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class InputFileType.
 *
 * @see https://core.telegram.org/bots/api#inputfile
 */
class InputFileType extends \SplFileInfo
{
    public static function create(string $path): InputFileType
    {
        return new static(filename: $path);
    }
}
