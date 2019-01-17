# phpstan-rules

[![Build Status](https://travis-ci.com/localheinz/phpstan-rules.svg?branch=master)](https://travis-ci.com/localheinz/phpstan-rules)
[![codecov](https://codecov.io/gh/localheinz/phpstan-rules/branch/master/graph/badge.svg)](https://codecov.io/gh/localheinz/phpstan-rules)
[![Latest Stable Version](https://poser.pugx.org/localheinz/phpstan-rules/v/stable)](https://packagist.org/packages/localheinz/phpstan-rules)
[![Total Downloads](https://poser.pugx.org/localheinz/phpstan-rules/downloads)](https://packagist.org/packages/localheinz/phpstan-rules)

Provides additional rules for [`phpstan/phpstan`](https://github.com/phpstan/phpstan).

## Installation

Run

```
$ composer require --dev localheinz/phpstan-rules
```

## Usage

All of the [rules](https://github.com/localheinz/phpstan-rules#rules) provided (and used) by this library are included in [`rules.neon`](rules.neon). The easiest way to use these rules in your project is to include `rules.neon` in your `phpstan.neon`:

```neon
includes:
	- vendor/localheinz/phpstan-rules/rules.neon
```

:bulb: You probably want to use these rules on top of the rules provided by:

* [`phpstan/phpstan`](https://github.com/phpstan/phpstan)
* [`phpstan/phpstan-deprecation-rules`](https://github.com/phpstan/phpstan)
* [`phpstan/phpstan-strict-rules`](https://github.com/phpstan/phpstan-strict-rules)

## Rules

This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):

* [`Localheinz\PHPStan\Rules\Classes\FinalRule`](https://github.com/localheinz/phpstan-rules#classesfinalrule)
* [`Localheinz\PHPStan\Rules\Classes\NoExtendsRule`](https://github.com/localheinz/phpstan-rules#classesnoextendsrule)
* [`Localheinz\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#closuresnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Closures\NoParameterWithNullableTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#closuresnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#closuresnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#functionsnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#functionsnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclaration`](https://github.com/localheinz/phpstan-rules#functionsnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoConstructorParameterWithDefaultValueRule`](https://github.com/localheinz/phpstan-rules#methodsnoconstructorparameterwithdefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithNullableTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithnulldefaultvaluerule)

### Classes

#### `Classes\FinalRule`

This rule reports an error when a non-anonymous class is not `final`.

##### Disallowing `abstract` classes

This rule allows to declare `abstract` classes. If you want to disallow `abstract` classes, you can set the `allowAbstractClasses` parameter to `false`:

```neon
parameters:
	allowAbstractClasses: false
```

##### Excluding classes from inspection

If you want to exclude classes from being inspected by this rule, you can set the `classesNotRequiredToBeAbstractOrFinal` to a list of class names:

```neon
parameters:
	classesNotRequiredToBeAbstractOrFinal:
		- Foo\Bar\NeitherAbstractNorFinal
		- Bar\Baz\NeitherAbstractNorFinal
```

#### `Classes\NoExtendsRule`

This rule reports an error when a class extends another class.

##### Allowing classes to be extended

If you want to allow some classes to be extended, you can set the `classesAllowedToBeExtended` parameter to a list of class names:

```neon
parameters:
	classesAllowedToBeExtended:
		- Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase
		- PHPStan\Testing\RuleTestCase
		- PHPUnit\Framework\TestCase
```

### Closures

#### `Closures\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a closure uses a nullable return type declaration.

#### `Closures\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a closure has a parameter with a nullable type declaration.

#### `Closures\NoParameterWithNullDefaultValueRule`

This rule reports an error when a closure has a parameter with `null` as default value.

### Functions

#### `Functions\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a function uses a nullable return type declaration.

#### `Functions\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a function has a parameter with a nullable type declaration.

#### `Functions\NoParameterWithNullDefaultValueRule`

This rule reports an error when a function has a parameter with `null` as default value.

### Methods

#### `Methods\NoConstructorParameterWithDefaultValueRule`

This rule reports an error when a constructor declared in

* an anonymous class
* a class

has a default value.

#### `Methods\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a method declared in

* an anonymous class
* a class
* an interface

uses a nullable return type declaration.

#### `Methods\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a method declared in

* an anonymous class
* a class
* an interface

has a parameter with a nullable type declaration.

#### `Methods\NoParameterWithNullDefaultValueRule`

This rule reports an error when a method declared in

* an anonymous class
* a class
* an interface

has a parameter with `null` as default value.

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
