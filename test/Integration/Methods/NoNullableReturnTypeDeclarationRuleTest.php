<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Methods;

use Localheinz\PHPStan\Rules\Methods\NoNullableReturnTypeDeclarationRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class NoNullableReturnTypeDeclarationRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
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

    public function providerAnalysisFails(): \Generator
    {
        $paths = [
            'method-in-anonymous-class-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInAnonymousClassWithNullableReturnTypeDeclaration.php',
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
                        Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure\MethodInClassWithNullableReturnTypeDeclaration::class
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInInterfaceWithNullableReturnTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::toString() has a nullable return type declaration.',
                        Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure\MethodInInterfaceWithNullableReturnTypeDeclaration::class
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

    protected function getRule(): Rule
    {
        return new NoNullableReturnTypeDeclarationRule();
    }
}
