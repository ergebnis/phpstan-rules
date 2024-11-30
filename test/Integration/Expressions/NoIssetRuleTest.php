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

#[Framework\Attributes\CoversClass(Expressions\NoIssetRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class NoIssetRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
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

    public static function provideCasesWhereAnalysisShouldFail(): iterable
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

    /**
     * @return Rules\Rule<Node\Expr\Isset_>
     */
    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoIssetRule();
    }
}
