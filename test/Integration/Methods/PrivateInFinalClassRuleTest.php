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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\PrivateInFinalClassRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\PrivateInFinalClassRule>
 */
final class PrivateInFinalClassRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testPrivateInFinalClassRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule'),
            [
                [
                    \sprintf(
                        'Method %s::method() is protected, but since the containing class is final, it can be private.',
                        Test\Fixture\Methods\PrivateInFinalClassRule\FinalClassWithProtectedMethod::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::method() is protected, but since the containing class is final, it can be private.',
                        Test\Fixture\Methods\PrivateInFinalClassRule\FinalClassWithProtectedMethodFromTrait::class,
                    ),
                    9,
                ],
                [
                    'Method method() in anonymous class is protected, but since the containing class is final, it can be private.',
                    8,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\PrivateInFinalClassRule();
    }
}
