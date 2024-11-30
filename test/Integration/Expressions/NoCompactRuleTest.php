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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Expressions;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use Ergebnis\PHPStan\Rules\Expressions;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Expressions\NoCompactRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class NoCompactRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
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

    public static function provideCasesWhereAnalysisShouldFail(): iterable
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

    /**
     * @return Rules\Rule<Node\Expr\FuncCall>
     */
    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoCompactRule();
    }
}
