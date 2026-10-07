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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoAccessToStaticMethodViaInstanceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoAccessToStaticMethodViaInstanceRule>
 */
final class NoAccessToStaticMethodViaInstanceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoAccessToStaticMethodViaInstanceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoAccessToStaticMethodViaInstanceRule'),
            [
                [
                    'Static method bar() should be called via class name, not via instance.',
                    7,
                ],
                [
                    'Static method bar() should be called via class name, not via instance.',
                    15,
                ],
                [
                    'Static method bar() should be called via class name, not via instance.',
                    16,
                ],
                [
                    'Static method bar() should be called via class name, not via instance.',
                    17,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoAccessToStaticMethodViaInstanceRule(
            self::createReflectionProvider(),
        );
    }
}
