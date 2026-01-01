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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoNullableReturnTypeDeclarationRule>
 */
final class NoNullableReturnTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoNullableReturnTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule'),
            [
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\ClassWithMethodWithNullableReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\ClassWithMethodWithNullableUnionReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\InterfaceWithMethodWithNullableReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\InterfaceWithMethodWithNullableUnionReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    'Method toString() in anonymous class has a nullable return type declaration.',
                    22,
                ],
                [
                    'Method toString() in anonymous class has a nullable return type declaration.',
                    29,
                ],
                [
                    'Method toString() in anonymous class has a nullable return type declaration.',
                    36,
                ],
                [
                    'Method toString() in anonymous class has a nullable return type declaration.',
                    43,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoNullableReturnTypeDeclarationRule(new Analyzer());
    }
}
