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

#[Framework\Attributes\CoversClass(Methods\NoParameterWithNullableTypeDeclarationRule::class)]
final class NoParameterWithNullableTypeDeclarationRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'method-in-anonymous-class-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/method-in-anonymous-class-with-parameter-with-type-declaration.php',
            'method-in-anonymous-class-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/method-in-anonymous-class-with-parameter-without-type-declaration.php',
            'method-in-anonymous-class-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/method-in-anonymous-class-without-parameters.php',
            'method-in-class-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInClassWithParameterWithTypeDeclaration.php',
            'method-in-class-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInClassWithParameterWithoutTypeDeclaration.php',
            'method-in-class-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInClassWithoutParameters.php',
            'method-in-interface-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInInterfaceWithParameterWithTypeDeclaration.php',
            'method-in-interface-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInInterfaceWithParameterWithoutTypeDeclaration.php',
            'method-in-interface-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInInterfaceWithoutParameters.php',
            // traits are not supported
            'method-in-trait-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInTraitWithParameterWithTypeDeclaration.php',
            'method-in-trait-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInTraitWithParameterWithoutTypeDeclaration.php',
            'method-in-trait-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Success/MethodInTraitWithoutParameters.php',
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
            'method-in-anonymous-class-with-parameter-with-nullable-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Failure/method-in-anonymous-class-with-parameter-with-nullable-type-declaration.php',
                [
                    'Method foo() in anonymous class has parameter $bar with a nullable type declaration.',
                    8,
                ],
            ],
            'method-in-anonymous-class-with-parameter-with-nullable-union-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Failure/method-in-anonymous-class-with-parameter-with-nullable-union-type-declaration.php',
                [
                    'Method foo() in anonymous class has parameter $bar with a nullable type declaration.',
                    8,
                ],
            ],
            'method-in-class-with-parameter-with-nullable-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Failure/MethodInClassWithParameterWithNullableTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure\MethodInClassWithParameterWithNullableTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
            'method-in-class-with-parameter-with-nullable-union-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Failure/MethodInClassWithParameterWithNullableUnionTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure\MethodInClassWithParameterWithNullableUnionTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-with-nullable-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Failure/MethodInInterfaceWithParameterWithNullableTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure\MethodInInterfaceWithParameterWithNullableTypeDeclaration::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-with-nullable-union-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullableTypeDeclarationRule/Failure/MethodInInterfaceWithParameterWithNullableUnionTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with a nullable type declaration.',
                        Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure\MethodInInterfaceWithParameterWithNullableUnionTypeDeclaration::class,
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
        return new Methods\NoParameterWithNullableTypeDeclarationRule();
    }
}
