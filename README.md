# Telegram Bot Api Base

[![Telegram bot api][ico-bot-api]][link-bot-api]
[![Latest Version][ico-version]][link-releases]
[![Software License][ico-license]](LICENSE.md)
[![build][ico-ci]][link-ci]
[![PHP Version >= 8.2][ico-php-v]][link-php-8-2]

> **This is a fork of [tg-bot-api/bot-api-base][link-upstream].**
> It keeps the original package name so it can be used as a drop-in replacement,
> and is released independently - see [CHANGELOG.md](CHANGELOG.md).
> Versions `2.0.0` and later come from this fork and require PHP 8.2+.

#### Supported Telegram Bot API 5.0 (November 4, 2020), with types, fields and method names updated through Bot API 10.2

## Installation

This fork is not published on Packagist. Add it as a VCS repository and require a tagged
version; the package name is unchanged, so it transparently replaces the upstream package.

``` json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/tinpansoul/bot-api-base.git" }
    ],
    "require": {
        "tg-bot-api/bot-api-base": "2.0.0"
    }
}
```

``` bash
composer update tg-bot-api/bot-api-base
```

## Usage

We support all psr17 and psr18 implementations, but we will use guzzle6 for example
```bash
composer require php-http/guzzle6-adapter http-interop/http-factory-guzzle --prefer-dist
```

```php
$botKey = '<bot key>';

$requestFactory = new Http\Factory\Guzzle\RequestFactory();
$streamFactory = new Http\Factory\Guzzle\StreamFactory();
$client = new Http\Adapter\Guzzle6\Client();

$apiClient = new \TgBotApi\BotApiBase\ApiClient($requestFactory, $streamFactory, $client);
$bot = new \TgBotApi\BotApiBase\BotApi($botKey, $apiClient, new \TgBotApi\BotApiBase\BotApiNormalizer());

$userId = '<user id>';

$bot->send(\TgBotApi\BotApiBase\Method\SendMessageMethod::create($userId, 'Hi'));
```

You can configure it to work in symfony, for example, in [this way](https://gist.github.com/greenplugin/09179bee606aa01b1ee00d049ab78fc4).

If you want to use your own api server - you can set url as 4th param in bot api

```php 
$bot = new \TgBotApi\BotApiBase\BotApi('<bot key>', $apiClient, new \TgBotApi\BotApiBase\BotApiNormalizer(), '<your-domain>');
```

### Allowed methods:

|Method|Allowed type|response|
|:--|:--|:--|
|`add`|AddStickerToSetMethod|bool|
|`answer`|AnswerCallbackQueryMethod, AnswerInlineQueryMethod, AnswerPreCheckoutQueryMethod, AnswerShippingQueryMethod|bool|
|`create`|CreateNewStickerSetMethod|bool|
|`delete`|DeleteChatPhotoMethod, DeleteChatStickerSetMethod, DeleteMessageMethod, DeleteStickerFromSetMethod, DeleteWebhookMethod|bool|
|`edit`|EditMessageCaptionMethod, EditMessageLiveLocationMethod, EditMessageMediaMethod, EditMessageReplyMarkupMethod, EditMessageTextMethod|bool|
|`forward`|ForwardMessageMethod|MessageType|
|`kick`|KickChatMemberMethod|bool|
|`leave`|LeaveChatMethod|bool|
|`pin`|PinChatMessageMethod|bool|
|`promote`|PromoteChatMemberMethod|bool|
|`restrict`|RestrictChatMemberMethod|bool|
|`send`|SendPhotoMethod, SendAudioMethod, SendDocumentMethod, SendVideoMethod, SendAnimationMethod, SendVoiceMethod, SendVideoNoteMethod, SendGameMethod, SendInvoiceMethod, SendLocationMethod, SendVenueMethod, SendContactMethod, SendStickerMethod, SendMessageMethod, SendPollMethod, SendDiceMethod|MessageType|
|`set`|SetChatDescriptionMethod, SetChatPhotoMethod, SetChatStickerSetMethod, SetChatTitleMethod, SetGameScoreMethod, SetStickerPositionInSetMethod, SetWebhookMethod, SetPassportDataErrorsMethod, SetChatPermissionsMethod, SetChatAdministratorCustomTitleMethod, SetMyCommandMethod, SetStickerSetThumbMethod|bool|
|`stop`|StopMessageLiveLocationMethod|bool|
|`stopPoll`|StopPollMethod|Poll|
|`unban`|UnbanChatMemberMethod|bool|
|`unpin`|UnpinChatMessageMethod, UnpinAllChatMessagesMethod|bool|
|`upload`|UploadStickerFileMethod|FileType|
|`exportChatInviteLink`|ExportChatInviteLinkMethod|string|
|`sendChatAction`|SendChatActionMethod|bool|
|`getUpdates`|GetUpdatesMethod|UpdateType[]|
|`getMe`|GetMeMethod|UserType|
|`getMyCommands`|GetMyCommandsMethod|BotCommandType|
|`getUserProfilePhotos`|GetUserProfilePhotosMethod|UserProfilePhotosType|
|`getWebhookInfo`|GetWebhookInfoMethod|WebhookInfoType|
|`getChatMembersCount`|GetChatMembersCountMethod|int|
|`getChat`|GetChatMethod|ChatType|
|`getChatAdministrators`|GetChatAdministratorsMethod|ChatMemberType[]|
|`getChatMember`|GetChatMemberMethod|ChatMemberType|
|`getChatMenuButton`|GetChatMenuButtonMethod|MenuButtonType|
|`getGameHighScores`|GetGameHighScoresMethod|GameHighScoreType[]|
|`getStickerSet`|GetStickerSetMethod|StickerSetType|
|`getFile`|GetFileMethod|FileType|
|`sendMediaGroup`|SendMediaGroupMethod|MessageType[]|
|`getAbsoluteFilePath`|FileType|string|
|`logOut`|LogOutMethod|bool|
|`close`|CloseMethod|bool|
|`copyMessage`|CopyMessageMethod|MessageIdType|
|`call($method, [string $type])`|any method class, [optional expected type]|array or excepted type object|

Implemented all methods and types referenced by [official Api](https://core.telegram.org/bots/api)

You can use  `BotApiComplete` instance as helper to call 
all methods from [official Api](https://core.telegram.org/bots/api) like this:

```php
$botKey = '<bot key>';

$requestFactory = new Http\Factory\Guzzle\RequestFactory()
$streamFactory = new Http\Factory\Guzzle\StreamFactory();
$client = new Http\Adapter\Guzzle6\Client();

$apiClient = new \TgBotApi\BotApiBase\ApiClient($requestFactory, $streamFactory, $client);
$bot = new \TgBotApi\BotApiBase\BotApiComplete($botKey, $apiClient, new \TgBotApi\BotApiBase\BotApi\BotApiNormalizer());

$userId = '<user id>';

$bot->sendMessage(\TgBotApi\BotApiBase\Method\SendMessageMethod::create($userId, 'Hi'));
```
[Learn api](https://tg-bot-api.github.io/bot-api-base/api/)
### Fetching webhooks

Method `fetch()` of WebhookFetcher handling Psr\Http\Message\RequestInterface or string and always returns instance of UpdateType or throwing BadRequestException.

```php
$fetcher = new \TgBotApi\BotApiBase\WebhookFetcher(new \TgBotApi\BotApiBase\BotApiNormalizer());
$update = $fetcher->fetch($request);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email wformps@gmail.com instead of using the issue tracker.

## Credits

- [Greenplugin][link-author-1]
- [Big-Shark][link-author-2]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-php-v]: https://img.shields.io/badge/php-%3E%3D%208.2-8892BF.svg?style=flat-square
[ico-bot-api]: https://img.shields.io/badge/Bot%20API-5.0-blue.svg?style=flat-square
[ico-version]: https://img.shields.io/github/v/tag/tinpansoul/bot-api-base.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-ci]: https://github.com/tinpansoul/bot-api-base/workflows/Build/badge.svg

[link-bot-api]: https://core.telegram.org/bots/api
[link-author-1]: https://github.com/greenplugin
[link-author-2]: https://github.com/Big-Shark
[link-contributors]: ../../contributors
[link-php-8-2]: https://www.php.net/releases/8_2_0.php
[link-releases]: https://github.com/tinpansoul/bot-api-base/releases
[link-upstream]: https://github.com/tg-bot-api/bot-api-base
[link-ci]: https://github.com/tinpansoul/bot-api-base/actions
