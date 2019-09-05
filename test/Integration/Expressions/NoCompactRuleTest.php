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

use Localheinz\PHPStan\Rules\Expressions\NoCompactRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Localheinz\PHPStan\Rules\Expressions\NoCompactRule
 */
final class NoCompactRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): iterable
    {
        $paths = [
            'compact-not-used' => __DIR__ . '/../../Fixture/Expressions/NoCompactRule/Success/compact-not-used.php',
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
            'compact-used-with-alias' => [
                __DIR__ . '/../../Fixture/Expressions/NoCompactRule/Failure/compact-used-with-alias.php',
                [
                    'Function compact() should not be used.',
                    12,
                ],
            ],
            'compact-used-with-correct-case' => [
                __DIR__ . '/../../Fixture/Expressions/NoCompactRule/Failure/compact-used-with-correct-case.php',
                [
                    'Function compact() should not be used.',
                    10,
                ],
            ],
            'compact-used-with-incorrect-case' => [
                __DIR__ . '/../../Fixture/Expressions/NoCompactRule/Failure/compact-used-with-incorrect-case.php',
                [
                    'Function compact() should not be used.',
                    10,
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
        return new NoCompactRule();
    }
}
