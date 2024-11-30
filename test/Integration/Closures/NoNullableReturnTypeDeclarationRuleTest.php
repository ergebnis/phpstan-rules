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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Closures;

use Ergebnis\PHPStan\Rules\Closures;
use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Closures\NoNullableReturnTypeDeclarationRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class NoNullableReturnTypeDeclarationRuleTest extends Test\Integration\AbstractTestCase
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
            'closure-with-nullable-union-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Closures/NoNullableReturnTypeDeclarationRule/Failure/closure-with-nullable-union-type-return-type-declaration.php',
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

    /**
     * @return Rules\Rule<Node\Expr\Closure>
     */
    protected function getRule(): Rules\Rule
    {
        return new Closures\NoNullableReturnTypeDeclarationRule();
    }
}
