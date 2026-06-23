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

namespace Ergebnis\PHPStan\Rules\Test\Integration\PropertyHooks;

use Ergebnis\PHPStan\Rules\PropertyHooks;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\PropertyHooks\NoReturnByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<PropertyHooks\NoReturnByReferenceRule>
 */
final class NoReturnByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoReturnByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/PropertyHooks/NoReturnByReferenceRule'),
            [
                [
                    \sprintf(
                        'Property hook %s::foo() returns by reference.',
                        Test\Fixture\PropertyHooks\NoReturnByReferenceRule\PropertyHookInClassReturningByReference::class,
                    ),
                    15,
                ],
                [
                    'Property hook foo() in anonymous class returns by reference.',
                    27,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new PropertyHooks\NoReturnByReferenceRule();
    }
}
