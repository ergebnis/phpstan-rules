# phpstan-rules

[![CI Status](https://github.com/localheinz/phpstan-rules/workflows/Continuous%20Integration/badge.svg)](https://github.com/localheinz/phpstan-rules/actions)
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

All of the [rules](https://github.com/localheinz/phpstan-rules#rules) provided (and used) by this library are included in [`rules.neon`](rules.neon).

When you are using [`phpstan/extension-installer`](https://github.com/phpstan/extension-installer), `rules.neon` will be automatically included.

Otherwise you need to include `rules.neon` in your `phpstan.neon`:

```neon
includes:
	- vendor/localheinz/phpstan-rules/rules.neon
```

:bulb: You probably want to use these rules on top of the rules provided by:

* [`phpstan/phpstan`](https://github.com/phpstan/phpstan)
* [`phpstan/phpstan-deprecation-rules`](https://github.com/phpstan/phpstan-deprecation-rules)
* [`phpstan/phpstan-strict-rules`](https://github.com/phpstan/phpstan-strict-rules)

## Rules

This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):

* [`Localheinz\PHPStan\Rules\Classes\FinalRule`](https://github.com/localheinz/phpstan-rules#classesfinalrule)
* [`Localheinz\PHPStan\Rules\Classes\NoExtendsRule`](https://github.com/localheinz/phpstan-rules#classesnoextendsrule)
* [`Localheinz\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#closuresnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Closures\NoParameterWithNullableTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#closuresnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#closuresnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Expressions\NoCompactRule`](https://github.com/localheinz/phpstan-rules#expressionsnocompactrule)
* [`Localheinz\PHPStan\Rules\Expressions\NoEmptyRule`](https://github.com/localheinz/phpstan-rules#expressionsnoemptyrule)
* [`Localheinz\PHPStan\Rules\Expressions\NoErrorSuppressionRule`](https://github.com/localheinz/phpstan-rules#expressionserrorsuppressionrule)
* [`Localheinz\PHPStan\Rules\Expressions\NoEvalRule`](https://github.com/localheinz/phpstan-rules#expressionsnoevalrule)
* [`Localheinz\PHPStan\Rules\Expressions\NoIssetRule`](https://github.com/localheinz/phpstan-rules#expressionsnoissetrule)
* [`Localheinz\PHPStan\Rules\Files\DeclareStrictTypesRule`](https://github.com/localheinz/phpstan-rules#filesdeclarestricttypesrule)
* [`Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#functionsnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclaration`](https://github.com/localheinz/phpstan-rules#functionsnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#functionsnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Methods\FinalInAbstractClassRule`](https://github.com/localheinz/phpstan-rules#methodsfinalinabstractclassrule)
* [`Localheinz\PHPStan\Rules\Methods\NoConstructorParameterWithDefaultValueRule`](https://github.com/localheinz/phpstan-rules#methodsnoconstructorparameterwithdefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnonullablereturntypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithContainerTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithcontainertypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithNullableTypeDeclarationRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithnullabletypedeclarationrule)
* [`Localheinz\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule`](https://github.com/localheinz/phpstan-rules#methodsnoparameterwithnulldefaultvaluerule)
* [`Localheinz\PHPStan\Rules\Statements\NoSwitchRule`](https://github.com/localheinz/phpstan-rules#statementsnoswitchrule)

### Classes

#### `Classes\FinalRule`

This rule reports an error when a non-anonymous class is not `final`.

:bulb: Doctrine entities are currently ignored when they are annotated with `@ORM\Entity` or `@Entity`.

##### Disallowing `abstract` classes

By default, this rule allows to declare `abstract` classes. If you want to disallow declaring `abstract` classes, you can set the `allowAbstractClasses` parameter to `false`:

```neon
parameters:
	allowAbstractClasses: false
```

##### Excluding classes from inspection

If you want to exclude classes from being inspected by this rule, you can set the `classesNotRequiredToBeAbstractOrFinal` parameter to a list of class names:

```neon
parameters:
	classesNotRequiredToBeAbstractOrFinal:
		- Foo\Bar\NeitherAbstractNorFinal
		- Bar\Baz\NeitherAbstractNorFinal
```

#### `Classes\NoExtendsRule`

This rule reports an error when a class extends another class.

##### Defaults

By default, this rule allows the following classes to be extended:

* [`PHPUnit\Framework\TestCase`](https://github.com/sebastianbergmann/phpunit/blob/7.5.2/src/Framework/TestCase.php)

##### Allowing classes to be extended

If you want to allow additional classes to be extended, you can set the `classesAllowedToBeExtended` parameter to a list of class names:

```neon
parameters:
	classesAllowedToBeExtended:
		- Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase
		- PHPStan\Testing\RuleTestCase
```

### Closures

#### `Closures\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a closure uses a nullable return type declaration.

#### `Closures\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a closure has a parameter with a nullable type declaration.

#### `Closures\NoParameterWithNullDefaultValueRule`

This rule reports an error when a closure has a parameter with `null` as default value.

### Expressions

#### `Expressions\NoCompactRule`

This rule reports an error when the function [`compact()`](https://www.php.net/compact) is used.

#### `Expressions\NoEmptyRule`

This rule reports an error when the language construct [`empty()`](https://www.php.net/empty) is used.

#### `Expressions\NoEvalRule`

This rule reports an error when the language construct [`eval()`](https://www.php.net/eval) is used.

#### `Expressions\NoErrorSuppressionRule`

This rule reports an error when [`@`](https://www.php.net/manual/en/language.operators.errorcontrol.php) is used to suppress errors.

#### `Expressions\NoIssetRule`

This rule reports an error when the language construct [`isset()`](https://www.php.net/isset) is used.

### Files

#### `Files\DeclareStrictTypesRule`

This rule reports an error when a non-empty file does not contain a `declare(strict_types=1)` declaration.

### Functions

#### `Functions\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a function uses a nullable return type declaration.

#### `Functions\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a function has a parameter with a nullable type declaration.

#### `Functions\NoParameterWithNullDefaultValueRule`

This rule reports an error when a function has a parameter with `null` as default value.

### Methods

#### `Methods\FinalInAbstractClassRule`

This rule reports an error when a concrete `public` or `protected `method in an `abstract` class is not `final`.

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

#### `Methods\NoParameterWithContainerTypeDeclarationRule`

This rule reports an error when a method has a type declaration for a known dependency injection container or service locator.

##### Defaults

By default, this rule disallows the use of type declarations indicating an implementation of

* [`Psr\Container\ContainerInterface`](https://github.com/php-fig/container/blob/1.0.0/src/ContainerInterface.php)

is expected to be injected into a method.

##### Configuring container interfaces

If you want to configure the list of interfaces implemented by dependency injection containers and service locators yourself, you can set the `interfacesImplementedByContainers` parameter to a list of interface names:

```neon
parameters:
	interfacesImplementedByContainers:
		- Fancy\DependencyInjection\ContainerInterface
		- Other\ServiceLocatorInterface
```

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

### Statements

#### `Statements\NoSwitchRule`

This rule reports an error when the statement [`switch()`](https://www.php.net/manual/control-structures.switch.php) is used.

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.

## Credits

The method [`FinalRule::isWhitelistedClass()`](src/Classes/FinalRule.php) is inspired by the work on [`FinalClassFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/2.15/src/Fixer/ClassNotation/FinalClassFixer.php) and [`FinalInternalClassFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/2.15/src/Fixer/ClassNotation/FinalInternalClassFixer.php), contributed by [Dariusz Rumiński](https://github.com/keradus), [Filippo Tessarotto](https://github.com/Slamdunk), and [Spacepossum](https://github.com/SpacePossum) for [`friendsofphp/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) (originally licensed under MIT).
