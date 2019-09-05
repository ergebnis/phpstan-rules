<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Expressions;

use Localheinz\PHPStan\Rules\Expressions\NoErrorSuppressionRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Localheinz\PHPStan\Rules\Expressions\NoErrorSuppressionRule
 */
final class NoErrorSuppressionRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): iterable
    {
        $paths = [
            'error-suppression-not-used' => __DIR__ . '/../../Fixture/Expressions/NoErrorSuppressionRule/Success/error-suppression-not-used.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function providerAnalysisFails(): iterable
    {
        $paths = [
            'error-suppression-used' => [
                __DIR__ . '/../../Fixture/Expressions/NoErrorSuppressionRule/Failure/error-suppression-used.php',
                [
                    'Error suppression via "@" should not be used.',
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
        return new NoErrorSuppressionRule();
    }
}
