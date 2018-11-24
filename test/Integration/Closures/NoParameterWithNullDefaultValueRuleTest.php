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

namespace Localheinz\PHPStan\Rules\Test\Integration\Closures;

use Localheinz\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule;
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

    public function providerAnalysisFails(): \Generator
    {
        $paths = [
            'closure-with-parameter-with-null-default-value' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Failure/closure-with-parameter-with-null-default-value.php',
                [
                    'Parameter "$bar" of closure should not have null as default value.',
                    7,
                ],
            ],
            'closure-with-parameter-with-root-namespace-referenced-null-default-value' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Failure/closure-with-parameter-with-root-namespace-referenced-null-default-value.php',
                [
                    'Parameter "$bar" of closure should not have null as default value.',
                    7,
                ],
            ],
            'closure-with-parameter-with-wrongly-capitalized-null-default-value' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule/Failure/closure-with-parameter-with-wrongly-capitalized-null-default-value.php',
                [
                    'Parameter "$bar" of closure should not have null as default value.',
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
