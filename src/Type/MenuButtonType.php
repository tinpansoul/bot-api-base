<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class MenuButtonType.
 *
 * @see https://core.telegram.org/bots/api#menubutton
 */
class MenuButtonType
{
    use FillFromArrayTrait;

    public const TYPE_COMMANDS = 'commands';

    public const TYPE_WEB_APP = 'web_app';

    public const TYPE_DEFAULT = 'default';

    /**
     * Type of the button must be one of the list: commands, web_app, default
     *
     * @var string
     */
    public $type;

    /**
     * Text on the button. Required for type 'web_app'
     *
     * @var string|null
     */
    public $text;

    /**
     * Description of the Web App that will be launched when the user presses the button. Required for type 'web_app'
     *
     * @var WebAppInfoType|null
     */
    public $webApp;

    /**
     * @param array|null $data
     *
     * @throws BadArgumentException
     *
     */
    public static function create(string $type, array $data = null): MenuButtonType
    {
        $static = new static();
        $static->type = $type;
        if ($data) {
            $static->fill(data: $data);
        }

        return $static;
    }
}
