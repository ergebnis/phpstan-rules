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

namespace Ergebnis\PHPStan\Rules\Test\Integration\PropertyHooks;

use Ergebnis\PHPStan\Rules\PropertyHooks;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\PropertyHooks\NoReturnByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<PropertyHooks\NoReturnByReferenceRule>
 */
final class NoReturnByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testNoReturnByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/PropertyHooks/NoReturnByReferenceRule'),
            [
                [
                    'Property hook get of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoReturnByReferenceRule\\InterfaceWithPropertyHooksReturningByReference::$foo returns by reference.',
                    10,
                    $this->errorTip(),
                ],
                [
                    'Property hook get of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoReturnByReferenceRule\\ClassWithPropertyHooksReturningByReference::$foo returns by reference.',
                    12,
                    $this->errorTip(),
                ],
                [
                    'Property hook get of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoReturnByReferenceRule\\ClassUsingTraitWithPropertyHooksReturningByReference::$foo returns by reference.',
                    12,
                    $this->errorTip(),
                ],
                [
                    'Property hook get of property Ergebnis\\PHPStan\\Rules\\Test\\Fixture\\PropertyHooks\\NoReturnByReferenceRule\\ClassWithPropertyHooksReturningByReference::$baz returns by reference.',
                    19,
                    $this->errorTip(),
                ],
                [
                    'Property hook get of property $foo in anonymous class returns by reference.',
                    21,
                    $this->errorTip(),
                ],
            ],
        );
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/phpstan.neon',
        ];
    }

    protected function getRule(): Rules\Rule
    {
        return new PropertyHooks\NoReturnByReferenceRule();
    }
}
