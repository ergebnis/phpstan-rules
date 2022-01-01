<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Statements;

use Ergebnis\PHPStan\Rules\Statements\NoSwitchRule;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Statements\NoSwitchRule
 */
final class NoSwitchRuleTest extends AbstractTestCase
{
    public function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'isset-not-used' => __DIR__ . '/../../Fixture/Statements/NoSwitchRule/Success/switch-not-used.php',
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
            'switch-used-with-correct-case' => [
                __DIR__ . '/../../Fixture/Statements/NoSwitchRule/Failure/switch-used-with-correct-case.php',
                [
                    'Control structures using switch should not be used.',
                    7,
                ],
            ],
            'switch-used-with-incorrect-case' => [
                __DIR__ . '/../../Fixture/Statements/NoSwitchRule/Failure/switch-used-with-incorrect-case.php',
                [
                    'Control structures using switch should not be used.',
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
        return new NoSwitchRule();
    }
}
