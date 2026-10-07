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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Constants;

use Ergebnis\PHPStan\Rules\Constants;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Constants\NoAccessToConstantViaInstanceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Constants\NoAccessToConstantViaInstanceRule>
 */
final class NoAccessToConstantViaInstanceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoAccessToConstantViaInstanceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Constants/NoAccessToConstantViaInstanceRule'),
            [
                [
                    'Static constant BAZ should be accessed via class name, not via instance.',
                    7,
                ],
                [
                    'Static constant QUX should be accessed via class name, not via instance.',
                    12,
                ],
                [
                    'Static constant BAZ should be accessed via class name, not via instance.',
                    13,
                ],
                [
                    'Static constant BAZ should be accessed via class name, not via instance.',
                    14,
                ],
                [
                    'Static constant BAZ should be accessed via class name, not via instance.',
                    15,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Constants\NoAccessToConstantViaInstanceRule(
            self::createReflectionProvider(),
        );
    }
}
