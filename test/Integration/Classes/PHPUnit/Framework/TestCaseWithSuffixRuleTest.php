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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes\PHPUnit\Framework;

use Ergebnis\PHPStan\Rules\Classes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Classes\PHPUnit\Framework\TestCaseWithSuffixRule
 *
 * @extends Testing\RuleTestCase<Classes\PHPUnit\Framework\TestCaseWithSuffixRule>
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class TestCaseWithSuffixRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testTestCaseWithSuffixRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRule'),
            [
                [
                    \sprintf(
                        'Class %s extends %s, is concrete, but does not have a Test suffix.',
                        Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\ConcreteTestCaseExtendingAbstractTestCaseWithoutSuffix::class,
                        Framework\TestCase::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s extends %s, is concrete, but does not have a Test suffix.',
                        Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\ConcreteTestCaseWithoutSuffix::class,
                        Framework\TestCase::class,
                    ),
                    9,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Classes\PHPUnit\Framework\TestCaseWithSuffixRule(self::createReflectionProvider());
    }
}
