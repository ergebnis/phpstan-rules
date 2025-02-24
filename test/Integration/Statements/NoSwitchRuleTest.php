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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Statements;

use Ergebnis\PHPStan\Rules\Statements;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Statements\NoSwitchRule
 *
 * @extends \PHPStan\Testing\RuleTestCase<Statements\NoSwitchRule>
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class NoSwitchRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoSwitchRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Statements/NoSwitchRule'),
            [
                [
                    'Control structures using switch should not be used.',
                    7,
                ],
                [
                    'Control structures using switch should not be used.',
                    15,
                ],
                [
                    'Control structures using switch should not be used.',
                    23,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Statements\NoSwitchRule();
    }
}
