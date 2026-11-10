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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes\PHPUnit\Framework;

use Ergebnis\PHPStan\Rules\Classes;
use PHPStan\Reflection;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Classes\PHPUnit\Framework\TestCaseWithSuffixRule
 *
 * @extends Testing\RuleTestCase<Classes\PHPUnit\Framework\TestCaseWithSuffixRule>
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterExample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Reference
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class TestCaseWithSuffixRuleWithoutPHPUnitTest extends Testing\RuleTestCase
{
    public function testTestCaseWithSuffixRuleDoesNotReportErrorsWhenPHPUnitTestCaseIsNotAvailable(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRuleWithoutPHPUnit/ClassExtendingParentClass.php',
            ],
            [],
        );
    }

    protected function getRule(): Rules\Rule
    {
        $reflectionProvider = self::createReflectionProvider();

        $reflectionProviderWithoutPHPUnitTestCase = $this->createMock(Reflection\ReflectionProvider::class);

        $reflectionProviderWithoutPHPUnitTestCase
            ->method('hasClass')
            ->willReturnCallback(static function (string $className) use ($reflectionProvider): bool {
                if ('PHPUnit\\Framework\\TestCase' === $className) {
                    return false;
                }

                return $reflectionProvider->hasClass($className);
            });

        $reflectionProviderWithoutPHPUnitTestCase
            ->method('getClass')
            ->willReturnCallback(static function (string $className) use ($reflectionProvider): Reflection\ClassReflection {
                if ('PHPUnit\\Framework\\TestCase' === $className) {
                    throw new \LogicException('PHPUnit\\Framework\\TestCase must not be looked up when it does not exist.');
                }

                return $reflectionProvider->getClass($className);
            });

        return new Classes\PHPUnit\Framework\TestCaseWithSuffixRule($reflectionProviderWithoutPHPUnitTestCase);
    }
}
