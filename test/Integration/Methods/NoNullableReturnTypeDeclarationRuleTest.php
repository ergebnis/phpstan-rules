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

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
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
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\MethodInClassWithNullableReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\MethodInClassWithNullableUnionReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\MethodInInterfaceWithNullableReturnTypeDeclaration::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\MethodInInterfaceWithNullableUnionReturnTypeDeclaration::class,
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
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoNullableReturnTypeDeclarationRule();
    }
}
