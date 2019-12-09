<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Expressions;

use Ergebnis\PHPStan\Rules\Expressions\NoIssetRule;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Expressions\NoIssetRule
 */
final class NoIssetRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): iterable
    {
        $paths = [
            'isset-not-used' => __DIR__ . '/../../Fixture/Expressions/NoIssetRule/Success/isset-not-used.php',
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
            'isset-used-with-correct-case' => [
                __DIR__ . '/../../Fixture/Expressions/NoIssetRule/Failure/isset-used-with-correct-case.php',
                [
                    'Language construct isset() should not be used.',
                    7,
                ],
            ],
            'isset-used-with-incorrect-case' => [
                __DIR__ . '/../../Fixture/Expressions/NoIssetRule/Failure/isset-used-with-incorrect-case.php',
                [
                    'Language construct isset() should not be used.',
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
        return new NoIssetRule();
    }
}
