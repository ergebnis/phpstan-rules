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

## Rules

This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):

* [`Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule`](https://github.com/localheinz/phpstan-rules#classesabstractorfinalrule)
* [`Localheinz\PHPStan\Rules\Classes\FinalRule`](https://github.com/localheinz/phpstan-rules#classesfinalrule)
* [`Localheinz\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#closuresnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Closures\NoParameterWithNullableTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#closuresnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#closuresnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#functionsnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#functionsnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclaration`](https://github.com/localheinz/phpstan-rules#functionsnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithNullableTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithnulldefaultvaluerule)

:bulb: If you want to use the same rules as used by this project, include [`rules.neon`](rules.neon) in your `phpstan.neon`:

```neon
includes:
	- vendor/localheinz/phpstan-rules/rules.neon
```

:bulb: You probably want to use these rules on top of [`phpstan/phpstan-strict-rules`](https://github.com/phpstan/phpstan-strict-rules).

### `Classes\AbstractOrFinalRule`

This rule reports an error when a non-anonymous class is neither `abstract` nor `final`.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule
```

:bulb: Optionally, you can configure the rule to ignore classes:

```neon
services:
	-
		class: Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule
		tags:
			- phpstan.rules.rule
		arguments:
			excludedClassNames:
				- Bar\Foo
				- Foo\Bar
```

:exclamation: This rule conflicts with [`Localheinz\PHPStan\Rules\Classes\FinalRule`](https://github.com/localheinz/phpstan-rules#classesfinalrule), so you probably only want to use one of these.

### `Classes\FinalRule`

This rule reports an error when a non-anonymous class is not `final`.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Classes\FinalRule
```

:bulb: Optionally, you can configure the rule to ignore classes:

```neon
services:
	-
		class: Localheinz\PHPStan\Rules\Classes\FinalRule
		tags:
			- phpstan.rules.rule
		arguments:
			excludedClassNames:
				- Bar\Foo
				- Foo\Bar
```
:exclamation: This rule conflicts with [`Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule`](https://github.com/localheinz/phpstan-rules#classesabstractorfinalrule), so you probably only want to use one of these.

### `Closures\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a closure uses a nullable return type declaration.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule
```

### `Closures\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a closure has a parameter with a nullable type declaration.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Closures\NoParameterWithNullableTypeDeclarationRule
```

### `Closures\NoParameterWithNullDefaultValueRule`

This rule reports an error when a closure has a parameter with `null` as default value.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule
```

### `Functions\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a function uses a nullable return type declaration.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule
```

### `Functions\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a function has a parameter with a nullable type declaration.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclarationRule
```

### `Functions\NoParameterWithNullDefaultValueRule`

This rule reports an error when a function has a parameter with `null` as default value.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule
```

### `Methods\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a method declared in an anonymous class, a class, or an interface uses a nullable return type declaration.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule
```

### `Methods\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a method declared in an anonymous class, a class, or an interface has a parameter with a nullable type declaration.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Methods\NoParameterWithNullableTypeDeclarationRule
```

### `Methods\NoParameterWithNullDefaultValueRule`

This rule reports an error when a method declared in an anonymous class, a class, or an interface has a parameter with `null` as default value.

If you want to use this rule, add it to your `phpstan.neon`:

```neon
rules:
	- Localheinz\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule
```

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
