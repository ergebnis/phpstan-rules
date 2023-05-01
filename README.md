# phpstan-rules

[![Integrate](https://github.com/ergebnis/phpstan-rules/workflows/Integrate/badge.svg)](https://github.com/ergebnis/phpstan-rules/actions)
[![Merge](https://github.com/ergebnis/phpstan-rules/workflows/Merge/badge.svg)](https://github.com/ergebnis/phpstan-rules/actions)
[![Release](https://github.com/ergebnis/phpstan-rules/workflows/Release/badge.svg)](https://github.com/ergebnis/phpstan-rules/actions)
[![Renew](https://github.com/ergebnis/phpstan-rules/workflows/Renew/badge.svg)](https://github.com/ergebnis/phpstan-rules/actions)

[![Code Coverage](https://codecov.io/gh/ergebnis/phpstan-rules/branch/main/graph/badge.svg)](https://codecov.io/gh/ergebnis/phpstan-rules)
[![Type Coverage](https://shepherd.dev/github/ergebnis/phpstan-rules/coverage.svg)](https://shepherd.dev/github/ergebnis/phpstan-rules)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/phpstan-rules/v/stable)](https://packagist.org/packages/ergebnis/phpstan-rules)
[![Total Downloads](https://poser.pugx.org/ergebnis/phpstan-rules/downloads)](https://packagist.org/packages/ergebnis/phpstan-rules)

Provides additional rules for [`phpstan/phpstan`](https://github.com/phpstan/phpstan).

## Installation

Run

```sh
composer require --dev ergebnis/phpstan-rules
```

## Usage

All of the [rules](https://github.com/ergebnis/phpstan-rules#rules) provided (and used) by this library are included in [`rules.neon`](rules.neon).

When you are using [`phpstan/extension-installer`](https://github.com/phpstan/extension-installer), `rules.neon` will be automatically included.

Otherwise you need to include `rules.neon` in your `phpstan.neon`:

```neon
includes:
	- vendor/ergebnis/phpstan-rules/rules.neon
```

:bulb: You probably want to use these rules on top of the rules provided by:

- [`phpstan/phpstan`](https://github.com/phpstan/phpstan)
- [`phpstan/phpstan-deprecation-rules`](https://github.com/phpstan/phpstan-deprecation-rules)
- [`phpstan/phpstan-strict-rules`](https://github.com/phpstan/phpstan-strict-rules)

## Rules

This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):

- [`Ergebnis\PHPStan\Rules\Classes\FinalRule`](https://github.com/ergebnis/phpstan-rules#classesfinalrule)
- [`Ergebnis\PHPStan\Rules\Classes\NoExtendsRule`](https://github.com/ergebnis/phpstan-rules#classesnoextendsrule)
- [`Ergebnis\PHPStan\Rules\Classes\PHPUnit\Framework\TestCaseWithSuffixRule`](https://github.com/ergebnis/phpstan-rules#classesphpunitframeworktestcasewithsuffixrule)
- [`Ergebnis\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule`](https://github.com/ergebnis/phpstan-rules#closuresnonullablereturntypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Closures\NoParameterWithNullableTypeDeclarationRule`](https://github.com/ergebnis/phpstan-rules#closuresnoparameterwithnullabletypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule`](https://github.com/ergebnis/phpstan-rules#closuresnoparameterwithnulldefaultvaluerule)
- [`Ergebnis\PHPStan\Rules\Expressions\NoCompactRule`](https://github.com/ergebnis/phpstan-rules#expressionsnocompactrule)
- [`Ergebnis\PHPStan\Rules\Expressions\NoErrorSuppressionRule`](https://github.com/ergebnis/phpstan-rules#expressionsnoerrorsuppressionrule)
- [`Ergebnis\PHPStan\Rules\Expressions\NoEvalRule`](https://github.com/ergebnis/phpstan-rules#expressionsnoevalrule)
- [`Ergebnis\PHPStan\Rules\Expressions\NoIssetRule`](https://github.com/ergebnis/phpstan-rules#expressionsnoissetrule)
- [`Ergebnis\PHPStan\Rules\Files\DeclareStrictTypesRule`](https://github.com/ergebnis/phpstan-rules#filesdeclarestricttypesrule)
- [`Ergebnis\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule`](https://github.com/ergebnis/phpstan-rules#functionsnonullablereturntypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclaration`](https://github.com/ergebnis/phpstan-rules#functionsnoparameterwithnullabletypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule`](https://github.com/ergebnis/phpstan-rules#functionsnoparameterwithnulldefaultvaluerule)
- [`Ergebnis\PHPStan\Rules\Methods\FinalInAbstractClassRule`](https://github.com/ergebnis/phpstan-rules#methodsfinalinabstractclassrule)
- [`Ergebnis\PHPStan\Rules\Methods\NoConstructorParameterWithDefaultValueRule`](https://github.com/ergebnis/phpstan-rules#methodsnoconstructorparameterwithdefaultvaluerule)
- [`Ergebnis\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule`](https://github.com/ergebnis/phpstan-rules#methodsnonullablereturntypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Methods\NoParameterWithContainerTypeDeclarationRule`](https://github.com/ergebnis/phpstan-rules#methodsnoparameterwithcontainertypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Methods\NoParameterWithNullableTypeDeclarationRule`](https://github.com/ergebnis/phpstan-rules#methodsnoparameterwithnullabletypedeclarationrule)
- [`Ergebnis\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule`](https://github.com/ergebnis/phpstan-rules#methodsnoparameterwithnulldefaultvaluerule)
- [`Ergebnis\PHPStan\Rules\Methods\PrivateInFinalClassRule`](https://github.com/ergebnis/phpstan-rules#methodsprivateinfinalclassrule)
- [`Ergebnis\PHPStan\Rules\Statements\NoSwitchRule`](https://github.com/ergebnis/phpstan-rules#statementsnoswitchrule)

### Classes

#### `Classes\FinalRule`

This rule reports an error when a non-anonymous class is not `final`.

:bulb: This rule ignores classes that

- use `@Entity`, `@ORM\Entity`, or `@ORM\Mapping\Entity` annotations
- use `Doctrine\ORM\Mapping\Entity` attributes

on the class level.

##### Disallowing `abstract` classes

By default, this rule allows to declare `abstract` classes. If you want to disallow declaring `abstract` classes, you can set the `allowAbstractClasses` parameter to `false`:

```neon
parameters:
	ergebnis:
		allowAbstractClasses: false
```

##### Excluding classes from inspection

If you want to exclude classes from being inspected by this rule, you can set the `classesNotRequiredToBeAbstractOrFinal` parameter to a list of class names:

```neon
parameters:
	ergebnis:
		classesNotRequiredToBeAbstractOrFinal:
			- Foo\Bar\NeitherAbstractNorFinal
			- Bar\Baz\NeitherAbstractNorFinal
```

#### `Classes\NoExtendsRule`

This rule reports an error when a class extends another class.

##### Defaults

By default, this rule allows the following classes to be extended:

- [`PHPUnit\Framework\TestCase`](https://github.com/sebastianbergmann/phpunit/blob/7.5.2/src/Framework/TestCase.php)

##### Allowing classes to be extended

If you want to allow additional classes to be extended, you can set the `classesAllowedToBeExtended` parameter to a list of class names:

```neon
parameters:
	ergebnis:
		classesAllowedToBeExtended:
			- Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase
			- PHPStan\Testing\RuleTestCase
```
#### `Classes\PHPUnit\Framework\TestCaseWithSuffixRule`

This rule reports an error when a concrete class is a sub-class of `PHPUnit\Framework\TestCase` but does not have a `Test` suffix.

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

- an anonymous class
- a class

has a default value.

#### `Methods\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a method declared in

- an anonymous class
- a class
- an interface

uses a nullable return type declaration.

#### `Methods\NoParameterWithContainerTypeDeclarationRule`

This rule reports an error when a method has a type declaration for a known dependency injection container or service locator.

##### Defaults

By default, this rule disallows the use of type declarations indicating an implementation of

- [`Psr\Container\ContainerInterface`](https://github.com/php-fig/container/blob/1.0.0/src/ContainerInterface.php)

is expected to be injected into a method.

##### Configuring container interfaces

If you want to configure the list of interfaces implemented by dependency injection containers and service locators yourself, you can set the `interfacesImplementedByContainers` parameter to a list of interface names:

```neon
parameters:
	ergebnis:
		interfacesImplementedByContainers:
			- Fancy\DependencyInjection\ContainerInterface
			- Other\ServiceLocatorInterface
```

#### `Methods\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a method declared in

- an anonymous class
- a class
- an interface

has a parameter with a nullable type declaration.

#### `Methods\NoParameterWithNullDefaultValueRule`

This rule reports an error when a method declared in

- an anonymous class
- a class
- an interface

has a parameter with `null` as default value.

#### `Methods\PrivateInFinalClassRule`

This rule reports an error when a method in a `final` class is `protected` but could be `private`.

### Statements

#### `Statements\NoSwitchRule`

This rule reports an error when the statement [`switch()`](https://www.php.net/manual/control-structures.switch.php) is used.

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](https://github.com/ergebnis/.github/blob/main/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.

Please have a look at [`LICENSE.md`](LICENSE.md).

## Credits

The method [`FinalRule::isWhitelistedClass()`](src/Classes/FinalRule.php) is inspired by the work on [`FinalClassFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/2.15/src/Fixer/ClassNotation/FinalClassFixer.php) and [`FinalInternalClassFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/2.15/src/Fixer/ClassNotation/FinalInternalClassFixer.php), contributed by [Dariusz Rumiński](https://github.com/keradus), [Filippo Tessarotto](https://github.com/Slamdunk), and [Spacepossum](https://github.com/SpacePossum) for [`friendsofphp/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) (originally licensed under MIT).

## Curious what I am up to?

Follow me on [Twitter](https://twitter.com/intent/follow?screen_name=localheinz)!
