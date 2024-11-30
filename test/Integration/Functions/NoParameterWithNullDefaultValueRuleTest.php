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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Functions;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use Ergebnis\PHPStan\Rules\Functions;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Functions\NoParameterWithNullDefaultValueRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class NoParameterWithNullDefaultValueRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
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

    public static function provideCasesWhereAnalysisShouldFail(): iterable
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

    /**
     * @return Rules\Rule<Node\Stmt\Function_>
     */
    protected function getRule(): Rules\Rule
    {
        return new Functions\NoParameterWithNullDefaultValueRule();
    }
}
