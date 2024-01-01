<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2024 Andreas Möller
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
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Methods\NoNullableReturnTypeDeclarationRule::class)]
final class NoNullableReturnTypeDeclarationRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'method-in-anonymous-class-with-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInAnonymousClassWithReturnTypeDeclaration.php',
            'method-in-anonymous-class-without-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInAnonymousClassWithoutReturnTypeDeclaration.php',
            'method-in-class-with-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInClassWithReturnTypeDeclaration.php',
            'method-in-class-without-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInClassWithoutReturnTypeDeclaration.php',
            'method-in-interface-with-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInInterfaceWithReturnTypeDeclaration.php',
            'method-in-interface-without-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInInterfaceWithoutReturnTypeDeclaration.php',
            // traits are currently not supported
            'method-in-trait-with-nullable-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInTraitWithNullableReturnTypeDeclaration.php',
            'method-in-trait-with-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInTraitWithReturnTypeDeclaration.php',
            'method-in-trait-without-return-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Success/MethodInTraitWithoutReturnTypeDeclaration.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public static function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'method-in-anonymous-class-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInAnonymousClassWithNullableReturnTypeDeclaration.php',
                [
                    'Method toString() in anonymous class has a nullable return type declaration.',
                    12,
                ],
            ],
            'method-in-anonymous-class-with-nullable-union-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInAnonymousClassWithNullableUnionReturnTypeDeclaration.php',
                [
                    'Method toString() in anonymous class has a nullable return type declaration.',
                    12,
                ],
            ],
            'method-in-class-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInClassWithNullableReturnTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure\MethodInClassWithNullableReturnTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
            'method-in-class-with-nullable-union-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInClassWithNullableUnionReturnTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure\MethodInClassWithNullableUnionReturnTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInInterfaceWithNullableReturnTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure\MethodInInterfaceWithNullableReturnTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-nullable-union-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInInterfaceWithNullableUnionReturnTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure\MethodInInterfaceWithNullableUnionReturnTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoNullableReturnTypeDeclarationRule();
    }
}
