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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Closures;

use Ergebnis\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule
 */
final class NoNullableReturnTypeDeclarationRuleTest extends AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'closure-with-return-type-declaration' => __DIR__ . '/../../Fixture/Closures/NoNullableReturnTypeDeclarationRule/Success/closure-with-return-type-declaration.php',
            'closure-function-without-return-type-declaration' => __DIR__ . '/../../Fixture/Closures/NoNullableReturnTypeDeclarationRule/Success/closure-without-return-type-declaration.php',
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
            'closure-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Closures/NoNullableReturnTypeDeclarationRule/Failure/closure-with-nullable-return-type-declaration.php',
                [
                    'Closure has a nullable return type declaration.',
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
