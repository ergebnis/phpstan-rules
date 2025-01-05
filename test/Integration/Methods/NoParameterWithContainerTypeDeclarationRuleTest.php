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
use Psr\Container;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoParameterWithContainerTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoParameterWithContainerTypeDeclarationRule>
 */
final class NoParameterWithContainerTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterWithContainerTypeDeclarationRuleTest(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule'),
            [
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassImplementingContainerInterfaceWithMethodWithParameterWithSelfAsTypeDeclaration::class,
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassImplementingContainerInterfaceWithMethodWithParameterWithSelfAsTypeDeclaration::class,
                    ),
                    11,
                ],
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassWithMethodWithParameterWithClassImplementingContainerInterfaceAsTypeDeclaration::class,
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassImplementingContainerInterface::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration::class,
                        Container\ContainerInterface::class,
                    ),
                    11,
                ],
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassWithMethodWithParameterWithInterfaceExtendingContainerInterfaceAsTypeDeclaration::class,
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\InterfaceExtendingContainerInterface::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\InterfaceWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration::class,
                        Container\ContainerInterface::class,
                    ),
                    11,
                ],
                [
                    \sprintf(
                        'Method __construct() in anonymous class has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\ClassImplementingContainerInterface::class,
                    ),
                    29,
                ],
                [
                    \sprintf(
                        'Method __construct() in anonymous class has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Container\ContainerInterface::class,
                    ),
                    36,
                ],
                [
                    \sprintf(
                        'Method __construct() in anonymous class has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\InterfaceExtendingContainerInterface::class,
                    ),
                    43,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoParameterWithContainerTypeDeclarationRule(
            self::createReflectionProvider(),
            [
                Container\ContainerInterface::class,
            ],
            [
                'loadExtension',
            ],
        );
    }
}
