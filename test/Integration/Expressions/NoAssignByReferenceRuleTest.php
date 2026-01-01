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
 * @covers \Ergebnis\PHPStan\Rules\Expressions\NoAssignByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Expressions\NoAssignByReferenceRule>
 */
final class NoAssignByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoAssignByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Expressions/NoAssignByReferenceRule'),
            [
                [
                    'Assign by reference should not be used.',
                    11,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Expressions\NoAssignByReferenceRule();
    }
}
