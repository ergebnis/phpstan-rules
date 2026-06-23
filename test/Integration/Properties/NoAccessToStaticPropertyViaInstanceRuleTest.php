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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Properties;

use Ergebnis\PHPStan\Rules\Properties;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Properties\NoAccessToStaticPropertyViaInstanceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Properties\NoAccessToStaticPropertyViaInstanceRule>
 */
final class NoAccessToStaticPropertyViaInstanceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoAccessToStaticPropertyViaInstanceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Properties/NoAccessToStaticPropertyViaInstanceRule'),
            [
                [
                    'Static property $BAR should be accessed via class name, not via instance.',
                    7,
                ],
                [
                    'Static property $BAR should be accessed via class name, not via instance.',
                    13,
                ],
                [
                    'Static property $BAR should be accessed via class name, not via instance.',
                    14,
                ],
                [
                    'Static property $BAR should be accessed via class name, not via instance.',
                    15,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Properties\NoAccessToStaticPropertyViaInstanceRule(
            self::createReflectionProvider(),
        );
    }
}
