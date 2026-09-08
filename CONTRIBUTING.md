# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/tinpansoul/bot-api-base).


## Pull Requests

- **[PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)** - Check the code style with ``$ composer check-style`` and fix it with ``$ composer fix-style``. `vendor/bin/grumphp run` runs the full gate: phpcs, php-cs-fixer, phpstan, phpunit and the rest.

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.


## Commit Messages

Commit subjects follow [Conventional Commits](https://www.conventionalcommits.org/):

```
type(scope): summary
```

`type` is one of `build`, `chore`, `ci`, `docs`, `feat`, `fix`, `perf`, `refactor`,
`revert`, `style` or `test`. `scope` is optional and lowercase - typically the area
touched, such as `client`, `normalizer`, `type` or `deps`. Add `!` before the colon
for a breaking change, and explain it in a `BREAKING CHANGE:` footer.

``` text
fix(client): encode arrays as JSON on the wire
feat(type): add ChatMemberUpdatedType to UpdateType
chore(deps): bump phpunit to 11.5

feat(api)!: declare getChatMemberCount on BotApiInterface

BREAKING CHANGE: classes implementing BotApiInterface must add the method.
Extending BotApi or BotApiComplete is unaffected.
```

Keep the subject to one line of 72 characters or fewer, lowercase after the colon,
and with no trailing period. A GrumPHP hook enforces this on commit.

One logical change per commit - that is what makes generated release notes readable.

`CHANGELOG.md` and the per-major `UPGRADE-N.0.md` files are written by hand, not
generated: they explain *why* a change was made and what to do about it.


## Running Tests

``` bash
$ composer test
```


**Happy coding**!
