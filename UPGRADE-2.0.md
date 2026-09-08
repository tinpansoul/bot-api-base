UPGRADE FROM 1.8 TO 2.0
=======================

Version 2.0 is the first release of the `tinpansoul/bot-api-base` fork. The package name is
unchanged, so it remains a drop-in replacement, but the runtime requirements and a number of
method parameter names changed.

Requirements
------------

 * PHP `^8.2` is now required (was `>7.3`).
 * Symfony `^7.4` is now required for `property-access`, `property-info` and `serializer`
   (was `^3.4|^4.3|^5.0|^6.0`), and `symfony/type-info` was added.
 * `phpdocumentor/reflection-docblock` was replaced by `phpdocumentor/type-resolver ^2.0`
   and `phpstan/phpdoc-parser ^2.3`.

Renamed method parameters
-------------------------

The codebase was modernised with Rector, which renamed several method parameters **and**
switched internal calls to named arguments. A named argument binds to the parameter name of
the concrete method after dispatch, so any subclass that overrides a `protected` method must
now declare the same parameter names as the parent.

The one that bites in practice is `ApiClient::createFileStream()`, whose third parameter was
renamed from `$file` to `$inputFileType`. An override written against 1.8 fails on **every
file upload** with:

```
Error: Unknown named parameter $inputFileType
```

Before:

```php
final class ApiClient extends \TgBotApi\BotApiBase\ApiClient
{
    protected function createFileStream($boundary, $name, InputFileType $file): string
    {
        return parent::createFileStream($boundary, $name, $file);
    }
}
```

After:

```php
final class ApiClient extends \TgBotApi\BotApiBase\ApiClient
{
    protected function createFileStream($boundary, $name, InputFileType $inputFileType): string
    {
        return parent::createFileStream($boundary, $name, $inputFileType);
    }
}
```

If you subclass any other class in this library, check that your overrides use the parent's
parameter names. Calls made through an *interface* (`ApiClientInterface`, `NormalizerInterface`,
and the PSR-7/17/18 interfaces) are passed positionally and are unaffected - implementations
are free to name their parameters however they like.

Property type resolution
------------------------

Denormalization resolves property types with `PhpStanExtractor` and `ReflectionExtractor`
instead of `PhpDocExtractor`, which current `symfony/property-info` no longer ships. If you
override `BotApiNormalizer::denormalize()` and build your own `ObjectNormalizer`, update it
to do the same, or your override will fail to resolve types once `PhpDocExtractor` is gone.
