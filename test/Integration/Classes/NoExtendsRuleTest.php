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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes;

use Ergebnis\PHPStan\Rules\Classes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Classes\NoExtendsRule
 *
 * @extends Testing\RuleTestCase<Classes\NoExtendsRule>
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
 */
final class NoExtendsRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    /**
     * @var list<class-string>
     */
    private array $classesAllowedToBeExtended;

    public function testNoExtendsRule(): void
    {
        $this->classesAllowedToBeExtended = [];

        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Classes/NoExtendsRule'),
            [
                [
                    \sprintf(
                        'Class "%s" is not allowed to extend "%s".',
                        Test\Fixture\Classes\NoExtendsRule\ClassExtendingOtherClass::class,
                        Test\Fixture\Classes\NoExtendsRule\OtherClass::class,
                    ),
                    7,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Anonymous class is not allowed to extend "%s".',
                        Test\Fixture\Classes\NoExtendsRule\OtherClass::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
            ],
        );
    }

    public function testNoExtendsRuleWithClassesAllowedToBeExtended(): void
    {
        $this->classesAllowedToBeExtended = [
            Test\Fixture\Classes\NoExtendsRule\OtherClass::class,
        ];

        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Classes/NoExtendsRule'),
            [],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Classes\NoExtendsRule($this->classesAllowedToBeExtended);
    }
}
