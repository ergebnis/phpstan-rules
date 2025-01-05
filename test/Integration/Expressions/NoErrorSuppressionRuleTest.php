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
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Expressions\NoErrorSuppressionRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Expressions\NoErrorSuppressionRule>
 */
final class NoErrorSuppressionRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoErrorSuppressionRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Expressions/NoErrorSuppressionRule'),
            [
                [
                    'Error suppression via "@" should not be used.',
                    9,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoErrorSuppressionRule();
    }
}
