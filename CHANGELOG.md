# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`0.10.0...master`](https://github.com/localheinz/phpstan-rules/compare/0.10.0...master).

### Added

* Added `Files\DeclareStrictTypesRule`, which reports an error when a PHP file does not have a `declare(strict_types=1)` declaration ([#79](https://github.com/localheinz/phpstan-rules/pull/79)), by [@dmecke](https://github.com/dmecke)

### Changed

* Require at least `nikic/php-parser:~0.11.15` ([#102](https://github.com/localheinz/phpstan-rules/pull/102)), by [@localheinz](https://github.com/localheinz)
* Require at least `phpstan/phpstan:~0.11.15` ([#103](https://github.com/localheinz/phpstan-rules/pull/103)), by [@localheinz](https://github.com/localheinz)

## [`0.10.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.10.0)

For a full diff see [`0.9.1...0.10.0`](https://github.com/localheinz/phpstan-rules/compare/0.9.1...0.10.0).

### Changed

* Require at least `phpstan/phpstan:~0.11.7` ([#91](https://github.com/localheinz/phpstan-rules/pull/91)), by [@localheinz](https://github.com/localheinz)

### Fixed

* Added missing `parametersSchema` configuration to `rules.neon`, which is required for use with `bleedingEdge.neon`, see [`phpstan/phpstan@54a125d`](https://github.com/phpstan/phpstan/commit/54a125df47fa097b792cb9a3e70c49f753f66b85) ([#93](https://github.com/localheinz/phpstan-rules/pull/93)), by [@localheinz](https://github.com/localheinz)
*
## [`0.9.1`](https://github.com/localheinz/phpstan-rules/releases/tag/0.9.1)

For a full diff see [`0.9.0...0.9.1`](https://github.com/localheinz/phpstan-rules/compare/0.9.0...0.9.1).

### Changed

* Allow usage with [`phpstan/extension-installer`](https://github.com/phpstan/extension-installer) ([#89](https://github.com/localheinz/phpstan-rules/pull/89)), by [@localheinz](https://github.com/localheinz)

## [`0.9.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.9.0)

For a full diff see [`0.8.1...0.9.0`](https://github.com/localheinz/phpstan-rules/compare/0.8.1...0.9.0).

### Changed

* Adjusted `Classes\FinalRule` to ignore Doctrine entities when they are annotated ([#84](https://github.com/localheinz/phpstan-rules/pull/84)), by [@localheinz](https://github.com/localheinz)

## [`0.8.1`](https://github.com/localheinz/phpstan-rules/releases/tag/0.8.1)

For a full diff see [`0.8.0...0.8.1`](https://github.com/localheinz/phpstan-rules/compare/0.8.0...0.8.1).

### Fixed

* Actually enable `Expressions\NoIssetRule` ([#83](https://github.com/localheinz/phpstan-rules/pull/83)), by [@localheinz](https://github.com/localheinz)

## [`0.8.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.8.0)

For a full diff see [`0.7.1...0.8.0`](https://github.com/localheinz/phpstan-rules/compare/0.7.1...0.8.0).

### Added

* Added `Expressions\NoIssetRule`, which reports an error when the language construct `isset()` is used ([#81](https://github.com/localheinz/phpstan-rules/pull/81)), by [@localheinz](https://github.com/localheinz)

## [`0.7.1`](https://github.com/localheinz/phpstan-rules/releases/tag/0.7.1)

For a full diff see [`0.7.0...0.7.1`](https://github.com/localheinz/phpstan-rules/compare/0.7.0...0.7.1).

### Changed

* Configured `Classes\NoExtendsRule` to allow a set of default classes to be extended ([#73](https://github.com/localheinz/phpstan-rules/pull/73)), by [@localheinz](https://github.com/localheinz)

## [`0.7.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.7.0)

For a full diff see [`0.6.0...0.7.0`](https://github.com/localheinz/phpstan-rules/compare/0.6.0...0.7.0).

### Added

* Added `Classes\NoExtendsRule`, which reports an error when a class extends a class that is not allowed to be extended ([#68](https://github.com/localheinz/phpstan-rules/pull/68)), by [@localheinz](https://github.com/localheinz)

## [`0.6.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.6.0)

For a full diff see [`0.5.0...0.6.0`](https://github.com/localheinz/phpstan-rules/compare/0.5.0...0.6.0).

### Added

* Allow installation with `phpstan/phpstan:~0.11.0` ([#65](https://github.com/localheinz/phpstan-rules/pull/65)), by [@localheinz](https://github.com/localheinz)

## [`0.5.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.5.0)

For a full diff see [`0.4.0...0.5.0`](https://github.com/localheinz/phpstan-rules/compare/0.4.0...0.5.0).

### Added

* Added `Methods\NoConstructorParameterWithDefaultValueRule`, which reports an error when a constructor of an anonymous class or a class has a parameter with a default value ([#45](https://github.com/localheinz/phpstan-rules/pull/45)), by [@localheinz](https://github.com/localheinz)
* Added parameters `$allowAbstractClasses` and `$classesNotRequiredToBeAbstractOrFinal` to allow configuration of `Classes`FinalRule` ([#51](https://github.com/localheinz/phpstan-rules/pull/51)), by [@localheinz](https://github.com/localheinz)

### Removed

* Removed `Classes\AbstractOrFinalRule` after merging behaviour into `Classes\FinalRule` ([#51](https://github.com/localheinz/phpstan-rules/pull/51)), by [@localheinz](https://github.com/localheinz)
* Removed default values from constructor of `Classes\FinalRule` ([#53](https://github.com/localheinz/phpstan-rules/pull/53)), by [@localheinz](https://github.com/localheinz)

## [`0.4.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.4.0)

For a full diff see [`0.3.0...0.4.0`](https://github.com/localheinz/phpstan-rules/compare/0.3.0...0.4.0).

### Changed

* Removed double-quotes from error messages to be more consistent with error messages generated by `phpstan/phstan` ([#39](https://github.com/localheinz/phpstan-rules/pull/39)), by [@localheinz](https://github.com/localheinz)
* Modified wording and placement of method, function, and parameter names in error messages to be more consistent with error messages generated by `phpstan/phstan` ([#42](https://github.com/localheinz/phpstan-rules/pull/42)), by [@localheinz](https://github.com/localheinz)

## [`0.3.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.3.0)

For a full diff see [`0.2.0...0.3.0`](https://github.com/localheinz/phpstan-rules/compare/0.2.0...0.3.0).

### Added

* Added `Functions\NoNullableReturnTypeDeclarationRule`, which reports an error when a function has a nullable return type declaration, and `Methods\NoNullableReturnTypeDeclarationRule`, which reports an error when a method declared in an anonymous class, a class, or an interface has a nullable return type declaration ([#16](https://github.com/localheinz/phpstan-rules/pull/16)), by [@localheinz](https://github.com/localheinz)
* Added `Closures\NoParameterWithNullDefaultValueRule`, which reports an error when a closure has a parameter with `null` as default value ([#26](https://github.com/localheinz/phpstan-rules/pull/26)), by [@localheinz](https://github.com/localheinz)
* Added `Closures\NoNullableReturnTypeDeclarationRule`, which reports an error when a closure has a nullable return type declaration ([#29](https://github.com/localheinz/phpstan-rules/pull/29)), by [@localheinz](https://github.com/localheinz)
* Added `Functions\NoParameterWithNullDefaultValueRule`, which reports an error when a function has a parameter with `null` as default value ([#31](https://github.com/localheinz/phpstan-rules/pull/31)), by [@localheinz](https://github.com/localheinz)
* Added `Methods\NoParameterWithNullDefaultValueRule`, which reports an error when a method declared in an anonymous class, a class, or an interface has a parameter with `null` as default value ([#32](https://github.com/localheinz/phpstan-rules/pull/32)), by [@localheinz](https://github.com/localheinz)
* Added `Closures\NoParameterWithNullableTypeDeclarationRule`, which reports an error when a closure has a parameter with a nullable type declaration ([#33](https://github.com/localheinz/phpstan-rules/pull/33)), by [@localheinz](https://github.com/localheinz)
* Added `Functions\NoParameterWithNullableTypeDeclarationRule`, which reports an error when a function has a parameter with a nullable type declaration ([#34](https://github.com/localheinz/phpstan-rules/pull/34)), by [@localheinz](https://github.com/localheinz)
* Added `Methods\NoParameterWithNullableTypeDeclarationRule`, which reports an error when a method declared in an anonymous class, a class, or an interface has a parameter with a nullable type declaration ([#35](https://github.com/localheinz/phpstan-rules/pull/35)), by [@localheinz](https://github.com/localheinz)
* Extracted `rules.neon`, so you can easily enable all rules by including it in your `phpstan.neon` ([#37](https://github.com/localheinz/phpstan-rules/pull/37)), by [@localheinz](https://github.com/localheinz)

## [`0.2.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.2.0)

For a full diff see [`0.1.0...0.2.0`](https://github.com/localheinz/phpstan-rules/compare/0.1.0...0.2.0).

### Added

* Added `Classes\FinalRule`, which reports an error when a non-anonymous class is not `final`, ([#4](https://github.com/localheinz/phpstan-rules/pull/4)), by [@localheinz](https://github.com/localheinz)

### Changed

* Added an `$excludeClassNames` argument to the constructors of `Classes\AbstractOrFinalRule` and `Classes\FinalRule` to allow whitelisting of classes, ([#4](https://github.com/localheinz/phpstan-rules/pull/11)), by [@localheinz](https://github.com/localheinz)

## [`0.1.0`](https://github.com/localheinz/phpstan-rules/releases/tag/0.1.0)

For a full diff see [`362c7ea...0.1.0`](https://github.com/localheinz/phpstan-rules/compare/362c7ea...0.1.0).

### Added

* Added `Classes\AbstractOrFinalRule`, which reports an error when a non-anonymous class is neither `abstract` nor `final`, ([#1](https://github.com/localheinz/phpstan-rules/pull/1)), by [@localheinz](https://github.com/localheinz)

