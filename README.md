# phpstan-rules

[![Build Status](https://travis-ci.com/localheinz/phpstan-rules.svg?branch=master)](https://travis-ci.com/localheinz/phpstan-rules)
[![codecov](https://codecov.io/gh/localheinz/phpstan-rules/branch/master/graph/badge.svg)](https://codecov.io/gh/localheinz/phpstan-rules)
[![Latest Stable Version](https://poser.pugx.org/localheinz/phpstan-rules/v/stable)](https://packagist.org/packages/localheinz/phpstan-rules)
[![Total Downloads](https://poser.pugx.org/localheinz/phpstan-rules/downloads)](https://packagist.org/packages/localheinz/phpstan-rules)

Provides additional rules for [`phpstan/phpstan`](https://github.com/phpstan/phpstan).

## Installation

Run

```
$ composer require localheinz/phpstan-rules
```

## Rules

This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):

* [`Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule`](https://github.com/localheinz/phpstan-rules#classesabstractorfinalrule)
* [`Localheinz\PHPStan\Rules\Classes\FinalRule`](https://github.com/localheinz/phpstan-rules#classesfinalrule)

### `Classes\AbstractOrFinalRule`

This rule reports an error when a non-anonymous class is neither `abstract` nor `final`.

### `Classes\FinalRule`

This rule reports an error when a non-anonymous class is not `final`.

## Usage

Add the rule of your choice to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule
```

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
