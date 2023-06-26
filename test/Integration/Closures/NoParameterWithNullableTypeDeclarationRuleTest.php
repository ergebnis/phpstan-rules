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

use Ergebnis\PHPStan\Rules\Closures;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules\Rule;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Closures\NoParameterWithNullableTypeDeclarationRule::class)]
final class NoParameterWithNullableTypeDeclarationRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'closure-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Success/closure-with-parameter-with-type-declaration.php',
            'closure-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Success/closure-with-parameter-without-type-declaration.php',
            'closure-without-parameters' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Success/closure-without-parameters.php',
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
            'closure-with-parameter-with-nullable-type-declaration' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Failure/closure-with-parameter-with-nullable-type-declaration.php',
                [
                    'Closure has parameter $bar with a nullable type declaration.',
                    7,
                ],
            ],
            'closure-with-parameter-with-nullable-union-type-declaration' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Failure/closure-with-parameter-with-nullable-union-type-declaration.php',
                [
                    'Closure has parameter $bar with a nullable type declaration.',
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
        return new Closures\NoParameterWithNullableTypeDeclarationRule();
    }
}
