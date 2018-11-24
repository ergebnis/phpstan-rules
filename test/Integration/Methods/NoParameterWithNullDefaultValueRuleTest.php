<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Methods;

use Localheinz\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class NoParameterWithNullDefaultValueRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
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

    public function providerAnalysisFails(): \Generator
    {
        $paths = [
            'method-in-anonymous-class-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/method-in-anonymous-class-with-parameter-with-null-default-value.php',
                [
                    'Parameter "$bar" of method "foo()" in anonymous class should not have null as default value.',
                    8,
                ],
            ],
            'method-in-anonymous-class-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/method-in-anonymous-class-with-parameter-with-root-namespace-referenced-null-default-value.php',
                [
                    'Parameter "$bar" of method "foo()" in anonymous class should not have null as default value.',
                    8,
                ],
            ],
            'method-in-anonymous-class-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/method-in-anonymous-class-with-parameter-with-wrongly-capitalized-null-default-value.php',
                [
                    'Parameter "$bar" of method "foo()" in anonymous class should not have null as default value.',
                    8,
                ],
            ],
            'method-in-class-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInClassWithParameterWithNullDefaultValue.php',
                [
                    \sprintf(
                        'Parameter "$bar" of method "%s::foo()" should not have null as default value.',
                        Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInClassWithParameterWithNullDefaultValue::class
                    ),
                    9,
                ],
            ],
            'method-in-class-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInClassWithParameterWithRootNamespaceReferencedNullDefaultValue.php',
                [
                    \sprintf(
                        'Parameter "$bar" of method "%s::foo()" should not have null as default value.',
                        Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInClassWithParameterWithRootNamespaceReferencedNullDefaultValue::class
                    ),
                    9,
                ],
            ],
            'method-in-class-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInClassWithParameterWithWronglyCapitalizedNullDefaultValue.php',
                [
                    \sprintf(
                        'Parameter "$bar" of method "%s::foo()" should not have null as default value.',
                        Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInClassWithParameterWithWronglyCapitalizedNullDefaultValue::class
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInInterfaceWithParameterWithNullDefaultValue.php',
                [
                    \sprintf(
                        'Parameter "$bar" of method "%s::foo()" should not have null as default value.',
                        Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInInterfaceWithParameterWithNullDefaultValue::class
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInInterfaceWithParameterWithRootNamespaceReferencedNullDefaultValue.php',
                [
                    \sprintf(
                        'Parameter "$bar" of method "%s::foo()" should not have null as default value.',
                        Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInInterfaceWithParameterWithRootNamespaceReferencedNullDefaultValue::class
                    ),
                    9,
                ],
            ],
            'method-in-interface-with-parameter-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule/Failure/MethodInInterfaceWithParameterWithWronlgyCapitalizedNullDefaultValue.php',
                [
                    \sprintf(
                        'Parameter "$bar" of method "%s::foo()" should not have null as default value.',
                        Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure\MethodInInterfaceWithParameterWithWronlgyCapitalizedNullDefaultValue::class
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
        return new NoParameterWithNullDefaultValueRule();
    }
}
