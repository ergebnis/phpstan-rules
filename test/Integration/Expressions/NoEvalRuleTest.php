<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
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
 * @covers \Ergebnis\PHPStan\Rules\Expressions\NoEvalRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Expressions\NoEvalRule>
 */
final class NoEvalRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoEvalRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Expressions/NoEvalRule'),
            [
                [
                    'Language construct eval() should not be used.',
                    13,
                ],
                [
                    'Language construct eval() should not be used.',
                    15,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoEvalRule();
    }
}
