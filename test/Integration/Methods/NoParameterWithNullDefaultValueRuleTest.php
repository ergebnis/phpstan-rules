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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Methods\NoParameterWithNullDefaultValueRule::class)]
final class NoParameterWithNullDefaultValueRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'method-in-anonymous-class-with-parameter-with-non-null-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/method-in-anonymous-class-with-parameter-with-non-null-default-value.php',
            'method-in-anonymous-class-with-parameter-without-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/method-in-anonymous-class-with-parameter-without-default-value.php',
            'method-in-anonymous-class-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/method-in-anonymous-class-without-parameters.php',
            'method-in-class-with-parameter-with-non-null-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInClassWithParameterWithNonNullDefaultValue.php',
            'method-in-class-with-parameter-without-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInClassWithParameterWithoutDefaultValue.php',
            'method-in-class-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInClassWithoutParameters.php',
            'method-in-interface-with-parameter-with-non-null-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInInterfaceWithParameterWithNonNullDefaultValue.php',
            'method-in-interface-with-parameter-without-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInInterfaceWithParameterWithoutDefaultValue.php',
            'method-in-interface-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInInterfaceWithoutParameters.php',
            // traits are not supported
            'method-in-trait-with-parameter-with-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInTraitWithParameterWithDefaultValue.php',
            'method-in-trait-with-parameter-with-non-null-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInTraitWithParameterWithNonNullDefaultValue.php',
            'method-in-trait-with-parameter-with-root-namespace-referenced-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInTraitWithParameterWithRootNamespaceReferencedNullDefaultValue.php',
            'method-in-trait-with-parameter-with-wrongly-capitalized-null-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInTraitWithParameterWithWronlgyCapitalizedNullDefaultValue.php',
            'method-in-trait-with-parameter-without-default-value' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInTraitWithParameterWithoutDefaultValue.php',
            'method-in-trait-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Success/MethodInTraitWithoutParameters.php',
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
            'method-in-anonymous-class-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/method-in-anonymous-class-with-parameter-with-null-default-value.php',
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    8,
                ],
            ],
            'method-in-anonymous-class-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/method-in-anonymous-class-with-parameter-with-root-namespace-referenced-null-default-value.php',
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    8,
                ],
            ],
            'method-in-anonymous-class-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/method-in-anonymous-class-with-parameter-with-wrongly-capitalized-null-default-value.php',
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    8,
                ],
            ],
            'method-in-class-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInClassWithParameterWithNullDefaultValue.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInClassWithParameterWithNullDefaultValue::class,
                    ),
                    9,
                ],
            ],
            'method-in-class-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInClassWithParameterWithRootNamespaceReferencedNullDefaultValue.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInClassWithParameterWithRootNamespaceReferencedNullDefaultValue::class,
                    ),
                    9,
                ],
            ],
            'method-in-class-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInClassWithParameterWithWronglyCapitalizedNullDefaultValue.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInClassWithParameterWithWronglyCapitalizedNullDefaultValue::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInInterfaceWithParameterWithNullDefaultValue.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInInterfaceWithParameterWithNullDefaultValue::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInInterfaceWithParameterWithRootNamespaceReferencedNullDefaultValue.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInInterfaceWithParameterWithRootNamespaceReferencedNullDefaultValue::class,
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInInterfaceWithParameterWithWronlgyCapitalizedNullDefaultValue.php',
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInInterfaceWithParameterWithWronlgyCapitalizedNullDefaultValue::class,
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
        return new Methods\NoParameterWithNullDefaultValueRule();
    }
}
