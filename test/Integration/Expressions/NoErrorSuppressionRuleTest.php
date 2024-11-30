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

#[Framework\Attributes\CoversClass(Expressions\NoErrorSuppressionRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class NoErrorSuppressionRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
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

    public static function provideCasesWhereAnalysisShouldFail(): iterable
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

    /**
     * @return Rules\Rule<Node\Expr\ErrorSuppress>
     */
    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoErrorSuppressionRule();
    }
}
