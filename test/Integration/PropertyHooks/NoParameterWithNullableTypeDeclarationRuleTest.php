<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\PropertyHooks;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\PropertyHooks;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\PropertyHooks\NoParameterWithNullableTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterExample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Reference
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<PropertyHooks\NoParameterWithNullableTypeDeclarationRule>
 */
final class NoParameterWithNullableTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testNoParameterWithNullableTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/PropertyHooks/NoParameterWithNullableTypeDeclarationRule'),
            [
                [
                    'Property hook set of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoParameterWithNullableTypeDeclarationRule\\InterfaceWithPropertyHooksWithParameterWithNullableTypeDeclaration::$foo has parameter $value with a nullable type declaration.',
                    10,
                    $this->errorTip(),
                ],
                [
                    'Property hook set of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoParameterWithNullableTypeDeclarationRule\\ClassWithPropertyHooksWithParameterWithNullableTypeDeclaration::$foo has parameter $value with a nullable type declaration.',
                    10,
                    $this->errorTip(),
                ],
                [
                    'Property hook set of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoParameterWithNullableTypeDeclarationRule\\ClassUsingTraitWithPropertyHooksWithParameterWithNullableTypeDeclaration::$foo has parameter $value with a nullable type declaration.',
                    10,
                    $this->errorTip(),
                ],
                [
                    'Property hook set of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoParameterWithNullableTypeDeclarationRule\\ClassWithPropertyHooksWithParameterWithNullableTypeDeclaration::$bar has parameter $value with a nullable type declaration.',
                    16,
                    $this->errorTip(),
                ],
                [
                    'Property hook set of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoParameterWithNullableTypeDeclarationRule\\ClassWithPropertyHooksWithParameterWithNullableTypeDeclaration::$baz has parameter $value with a nullable type declaration.',
                    22,
                    $this->errorTip(),
                ],
                [
                    'Property hook set of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoParameterWithNullableTypeDeclarationRule\\ClassWithPropertyHooksWithParameterWithNullableTypeDeclaration::$qux has parameter $value with a nullable type declaration.',
                    29,
                    $this->errorTip(),
                ],
                [
                    'Property hook set of property $foo in anonymous class has parameter $value with a nullable type declaration.',
                    17,
                    $this->errorTip(),
                ],
            ],
        );
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/phpstan.neon',
        ];
    }

    protected function getRule(): Rules\Rule
    {
        return new PropertyHooks\NoParameterWithNullableTypeDeclarationRule(new Analyzer());
    }
}
