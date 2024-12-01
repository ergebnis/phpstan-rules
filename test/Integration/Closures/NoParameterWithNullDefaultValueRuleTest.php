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
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;

/**
 * @covers \Ergebnis\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class NoParameterWithNullDefaultValueRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'closure-with-parameter-with-non-null-default-value' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Success/closure-with-parameter-with-non-null-default-value.php',
            'closure-with-parameter-without-default-value' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Success/closure-with-parameter-without-default-value.php',
            'closure-with-parameter-without-parameters' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Success/closure-without-parameters.php',
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
            'closure-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Failure/closure-with-parameter-with-null-default-value.php',
                [
                    'Closure has parameter $bar with null as default value.',
                    7,
                ],
            ],
            'closure-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Failure/closure-with-parameter-with-root-namespace-referenced-null-default-value.php',
                [
                    'Closure has parameter $bar with null as default value.',
                    7,
                ],
            ],
            'closure-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Failure/closure-with-parameter-with-wrongly-capitalized-null-default-value.php',
                [
                    'Closure has parameter $bar with null as default value.',
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
        return new Closures\NoParameterWithNullDefaultValueRule();
    }
}
