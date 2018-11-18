# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`0.2.0...master`](https://github.com/localheinz/phpstan-rules/compare/0.2.0...master).

## [`0.2.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.2.0)

For a full diff see [`0.1.0...master`](https://github.com/localheinz/phpstan-rules/compare/0.1.0...master).

### Added

* added `Classes\FinalRule`, which reports an error when a non-anonymous
  class is not `final`, ([#4](https://github.com/localheinz/phpstan-rules/pull/4)), by [@localheinz](https://github.com/localheinz)

### Changed

* added an `$excludeClassNames` argument to the constructors of `Classes\AbstractOrFinalRule` and
  `Classes\FinalRule` to allow whitelisting of classes, ([#4](https://github.com/localheinz/phpstan-rules/pull/11)), by [@localheinz](https://github.com/localheinz)

## [`0.1.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.1.0)

For a full diff see [`362c7ea...0.1.0`](https://github.com/localheinz/phpstan-rules/compare/362c7ea...0.1.0).

### Added

* added `Classes\AbstractOrFinalRule`, which reports an error when a non-anonymous
  class is neither `abstract` nor `final`, ([#1](https://github.com/localheinz/phpstan-rules/pull/1)), by [@localheinz](https://github.com/localheinz)

