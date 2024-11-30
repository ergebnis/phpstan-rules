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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Statements;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use Ergebnis\PHPStan\Rules\Statements;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Statements\NoSwitchRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class NoSwitchRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
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

    public static function provideCasesWhereAnalysisShouldFail(): iterable
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

    /**
     * @return Rules\Rule<Node\Stmt\Switch_>
     */
    protected function getRule(): Rules\Rule
    {
        return new Statements\NoSwitchRule();
    }
}
