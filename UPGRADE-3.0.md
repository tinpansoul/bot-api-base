UPGRADE FROM 2.x TO 3.0
=======================

One breaking change, and it only affects code that **implements** `BotApiInterface`.
If you use `BotApi` or `BotApiComplete`, or extend either of them, nothing changes.

`BotApiInterface::getChatMemberCount()`
---------------------------------------

Telegram renamed `getChatMembersCount` to `getChatMemberCount`, and the old name is absent
from the current Bot API documentation. The interface now declares both, so any class
implementing `BotApiInterface` directly must add the new method or PHP will refuse to load it:

```
Class X contains 1 abstract method and must therefore be declared abstract
or implement the remaining method (TgBotApi\BotApiBase\BotApiInterface::getChatMemberCount)
```

Add:

```php
public function getChatMemberCount(GetChatMemberCountMethod $getChatMemberCountMethod): int
{
    return $this->call($getChatMemberCountMethod);
}
```

Classes that extend `BotApi` or `BotApiComplete` inherit the method from `GetMethodTrait`
and need no change. Mock objects created from the interface are also unaffected.

Renamed methods
---------------

Three methods were renamed by Telegram. The new names are available now; the old ones still
work, are marked `@deprecated`, and will be removed in a future major release. Nothing is
rewritten for you - `KickChatMemberMethod` still calls `kickChatMember` on the API, so switch
deliberately.

| Deprecated                     | Use instead                        |
|--------------------------------|------------------------------------|
| `KickChatMemberMethod`         | `BanChatMemberMethod`              |
| `GetChatMembersCountMethod`    | `GetChatMemberCountMethod`         |
| `SetStickerSetThumbMethod`     | `SetStickerSetThumbnailMethod`     |
| `$api->kickChatMember()`       | `$api->banChatMember()`            |
| `$api->getChatMembersCount()`  | `$api->getChatMemberCount()`       |
| `$api->setStickerSetThumb()`   | `$api->setStickerSetThumbnail()`   |

`BanChatMemberMethod` adds `$revokeMessages`, and `SetStickerSetThumbnailMethod` takes a
required `$format` ("static", "animated" or "video") and uses `$thumbnail` rather than
`$thumb`, matching the current API.

The old method classes are absent from the Bot API 10.2 documentation. The server has
historically kept accepting the old names, but that is undocumented and should not be
relied on.
