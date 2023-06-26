<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules\Rule;
use PHPUnit\Framework;
use Psr\Container;

#[Framework\Attributes\CoversClass(Methods\NoParameterWithContainerTypeDeclarationRule::class)]
final class NoParameterWithContainerTypeDeclarationRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'anonymous-class-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration-where-name-is-excluded' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/anonymous-class-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration-where-name-is-excluded.php',
            'anonymous-class-with-method-with-parameter-with-other-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/anonymous-class-with-method-with-parameter-with-other-type-declaration.php',
            'anonymous-class-with-method-without-parameters' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/anonymous-class-with-method-without-parameter.php',
            'class-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration-where-name-is-excluded' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/ClassWithMethodWithParameterWithClassImplementingContainerInterfaceAsTypeDeclarationWhereNameIsExcluded.php',
            'class-with-method-with-parameter-with-other-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/ClassWithMethodWithParameterWithOtherTypeDeclaration.php',
            'class-with-method-without-parameter' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/ClassWithMethodWithoutParameter.php',
            'interface-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration-where-name-is-excluded' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/InterfaceWithMethodWithParameterWithContainerInterfaceAsTypeDeclarationWhereNameIsExcluded.php',
            'interface-with-method-with-parameter-with-other-type-declaration' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/InterfaceWithMethodWithParameterWithOtherTypeDeclaration.php',
            'interface-with-method-without-parameter' => __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Success/InterfaceWithMethodWithoutParameter.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public static function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'anonymous-class-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/anonymous-class-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration.php',
                [
                    \sprintf(
                        'Method __construct() in anonymous class has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassImplementingContainerInterface::class,
                    ),
                    9,
                ],
            ],
            'anonymous-class-with-method-with-parameter-with-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/anonymous-class-with-method-with-parameter-with-container-interface-as-type-declaration.php',
                [
                    \sprintf(
                        'Method __construct() in anonymous class has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Container\ContainerInterface::class,
                    ),
                    11,
                ],
            ],
            'anonymous-class-with-method-with-parameter-with-interface-extending-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/anonymous-class-with-method-with-parameter-with-interface-extending-container-interface-as-type-declaration.php',
                [
                    \sprintf(
                        'Method __construct() in anonymous class has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\InterfaceExtendingContainerInterface::class,
                    ),
                    9,
                ],
            ],
            'class-implementing-container-interface-with-method-with-parameter-with-self-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/ClassImplementingContainerInterfaceWithMethodWithParameterWithSelfAsTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassImplementingContainerInterfaceWithMethodWithParameterWithSelfAsTypeDeclaration::class,
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassImplementingContainerInterfaceWithMethodWithParameterWithSelfAsTypeDeclaration::class,
                    ),
                    11,
                ],
            ],
            'class-with-method-with-parameter-with-class-implementing-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/ClassWithMethodWithParameterWithClassImplementingContainerInterfaceAsTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassWithMethodWithParameterWithClassImplementingContainerInterfaceAsTypeDeclaration::class,
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassImplementingContainerInterface::class,
                    ),
                    9,
                ],
            ],
            'class-with-method-with-parameter-with-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/ClassWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration::class,
                        Container\ContainerInterface::class,
                    ),
                    11,
                ],
            ],
            'class-with-method-with-parameter-with-interface-extending-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/ClassWithMethodWithParameterWithInterfaceExtendingContainerInterfaceAsTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassWithMethodWithParameterWithInterfaceExtendingContainerInterfaceAsTypeDeclaration::class,
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\InterfaceExtendingContainerInterface::class,
                    ),
                    9,
                ],
            ],
            'interface-with-method-with-parameter-with-container-interface-as-type-declaration' => [
                __DIR__ . '/../../Fixture/Methods/NoParameterWithContainerTypeDeclarationRule/Failure/InterfaceWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration.php',
                [
                    \sprintf(
                        'Method %s::method() has a parameter $container with a type declaration of %s, but containers should not be injected.',
                        Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\InterfaceWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration::class,
                        Container\ContainerInterface::class,
                    ),
                    11,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    protected function getRule(): Rule
    {
        return new Methods\NoParameterWithContainerTypeDeclarationRule(
            $this->createReflectionProvider(),
            [
                Container\ContainerInterface::class,
            ],
            [
                'loadExtension',
            ],
        );
    }
}
