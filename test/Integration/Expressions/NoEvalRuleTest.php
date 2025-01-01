<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Expressions;

use Ergebnis\PHPStan\Rules\Expressions;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;

/**
 * @covers \Ergebnis\PHPStan\Rules\Expressions\NoEvalRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class NoEvalRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'eval-not-used' => __DIR__ . '/../../Fixture/Expressions/NoEvalRule/Success/eval-not-used.php',
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
            'eval-used-with-correct-case' => [
                __DIR__ . '/../../Fixture/Expressions/NoEvalRule/Failure/eval-used-with-correct-case.php',
                [
                    'Language construct eval() should not be used.',
                    7,
                ],
            ],
            'eval-used-with-incorrect-case' => [
                __DIR__ . '/../../Fixture/Expressions/NoEvalRule/Failure/eval-used-with-incorrect-case.php',
                [
                    'Language construct eval() should not be used.',
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
     * @return Rules\Rule<Node\Expr\Eval_>
     */
    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoEvalRule();
    }
}
