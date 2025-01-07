<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoParameterWithNullableTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoParameterWithNullableTypeDeclarationRule>
 */
final class NoParameterWithNullableTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterWithNullableTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule'),
            [
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\MethodInClassWithParameterWithNullableTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\MethodInClassWithParameterWithNullableUnionTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\MethodInInterfaceWithParameterWithNullableTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\MethodInInterfaceWithParameterWithNullableUnionTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with a nullable type declaration.',
                    28,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with a nullable type declaration.',
                    35,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoParameterWithNullableTypeDeclarationRule(new Analyzer());
    }
}
