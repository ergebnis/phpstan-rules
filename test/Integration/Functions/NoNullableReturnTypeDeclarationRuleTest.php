<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Functions;

use Ergebnis\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule
 */
final class NoNullableReturnTypeDeclarationRuleTest extends AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'function-with-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Success/function-with-return-type-declaration.php',
            'function-without-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Success/function-without-return-type-declaration.php',
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
            'function-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Failure/function-with-nullable-return-type-declaration.php',
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\Failure\foo() has a nullable return type declaration.',
                    7,
                ],
            ],
            'function-with-nullable-union-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Failure/function-with-nullable-union-return-type-declaration.php',
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\Failure\foo() has a nullable return type declaration.',
                    7,
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
