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

namespace Closures;

use Ergebnis\PHPStan\Rules\Closures;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Closures\NoParameterPassedByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Closures\NoParameterPassedByReferenceRule>
 */
final class NoParameterPassedByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterPassedByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Closures/NoParameterPassedByReferenceRule'),
            [
                [
                    'Closure has parameter $bar that is passed by reference.',
                    18,
                ],
                [
                    'Closure has parameter $bar that is passed by reference.',
                    22,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Closures\NoParameterPassedByReferenceRule();
    }
}
