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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Functions;

use Ergebnis\PHPStan\Rules\Functions;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Functions\NoParameterPassedByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Functions\NoParameterPassedByReferenceRule>
 */
final class NoParameterPassedByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterPassedByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Functions/NoParameterPassedByReferenceRule'),
            [
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterPassedByReferenceRule\baz() has parameter $bar that is passed by reference.',
                    16,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterPassedByReferenceRule\qux() has parameter $bar that is passed by reference.',
                    21,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Functions\NoParameterPassedByReferenceRule();
    }
}
