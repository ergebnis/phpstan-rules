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

use Ergebnis\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Functions\NoParameterWithNullDefaultValueRule
 */
final class NoParameterWithNullDefaultValueRuleTest extends AbstractTestCase
{
    public function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'function-with-parameter-with-non-null-default-value' => __DIR__ . '/../../Fixture/Functions/NoParameterWithNullDefaultValueRule/Success/function-with-parameter-with-non-null-default-value.php',
            'function-with-parameter-without-default-value' => __DIR__ . '/../../Fixture/Functions/NoParameterWithNullDefaultValueRule/Success/function-with-parameter-without-default-value.php',
            'function-without-parameters' => __DIR__ . '/../../Fixture/Functions/NoParameterWithNullDefaultValueRule/Success/function-without-parameters.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'function-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Functions/NoParameterWithNullDefaultValueRule/Failure/function-with-parameter-with-null-default-value.php',
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullDefaultValueRule\Failure\foo() has parameter $bar with null as default value.',
                    7,
                ],
            ],
            'function-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Functions/NoParameterWithNullDefaultValueRule/Failure/function-with-parameter-with-root-namespace-referenced-null-default-value.php',
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullDefaultValueRule\Failure\foo() has parameter $bar with null as default value.',
                    7,
                ],
            ],
            'function-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Functions/NoParameterWithNullDefaultValueRule/Failure/function-with-parameter-with-wrongly-capitalized-null-default-value.php',
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullDefaultValueRule\Failure\foo() has parameter $bar with null as default value.',
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
        return new NoParameterWithNullDefaultValueRule();
    }
}
