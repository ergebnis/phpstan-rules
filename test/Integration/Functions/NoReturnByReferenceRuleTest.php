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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Functions;

use Ergebnis\PHPStan\Rules\Functions;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Functions\NoReturnByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Functions\NoReturnByReferenceRule>
 */
final class NoReturnByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoReturnByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Functions/NoReturnByReferenceRule'),
            [
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoReturnByReferenceRule\bar() returns by reference.',
                    11,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Functions\NoReturnByReferenceRule();
    }
}
