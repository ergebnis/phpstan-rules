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

namespace Ergebnis\PHPStan\Rules\Methods;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;

final class NoParameterWithContainerTypeDeclarationRule implements Rule
{
    /**
     * @var Reflection\ReflectionProvider
     */
    private $reflectionProvider;

    /**
     * @var array<int, string>
     */
    private $interfacesImplementedByContainers;

    /**
     * @param array<int, string> $interfacesImplementedByContainers
     */
    public function __construct(
        Reflection\ReflectionProvider $reflectionProvider,
        array $interfacesImplementedByContainers
    ) {
        $this->reflectionProvider = $reflectionProvider;
        $this->interfacesImplementedByContainers = \array_filter(
            \array_map(static function (string $interfaceImplementedByContainers): string {
                return $interfaceImplementedByContainers;
            }, $interfacesImplementedByContainers),
            static function (string $interfaceImplementedByContainer): bool {
                return \interface_exists($interfaceImplementedByContainer);
            },
        );
    }

    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(
        Node $node,
        Scope $scope
    ): array {
        if (!$node instanceof Node\Stmt\ClassMethod) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\ClassMethod::class,
                \get_class($node),
            ));
        }

        if (0 === \count($this->interfacesImplementedByContainers)) {
            return [];
        }

        if (0 === \count($node->params)) {
            return [];
        }

        $methodName = $node->name->toString();

        /** @var Reflection\ClassReflection $containingClass */
        $containingClass = $scope->getClassReflection();

        return \array_reduce(
            $node->params,
            function (array $errors, Node\Param $node) use ($scope, $containingClass, $methodName) {
                $type = $node->type;

                if (!$type instanceof Node\Name) {
                    return $errors;
                }

                /** @var Node\Expr\Variable $variable */
                $variable = $node->var;

                /** @var string $parameterName */
                $parameterName = $variable->name;

                $classUsedInTypeDeclaration = $this->reflectionProvider->getClass($scope->resolveName($type));

                if ($classUsedInTypeDeclaration->isInterface()) {
                    foreach ($this->interfacesImplementedByContainers as $interfaceImplementedByContainer) {
                        if ($classUsedInTypeDeclaration->getNativeReflection()->isSubclassOf($interfaceImplementedByContainer)) {
                            $errors[] = self::createError(
                                $containingClass,
                                $methodName,
                                $parameterName,
                                $classUsedInTypeDeclaration,
                            );

                            return $errors;
                        }
                    }
                }

                foreach ($this->interfacesImplementedByContainers as $interfaceImplementedByContainer) {
                    if ($classUsedInTypeDeclaration->getNativeReflection()->implementsInterface($interfaceImplementedByContainer)) {
                        $errors[] = self::createError(
                            $containingClass,
                            $methodName,
                            $parameterName,
                            $classUsedInTypeDeclaration,
                        );

                        return $errors;
                    }
                }

                return $errors;
            },
            [],
        );
    }

    private static function createError(
        Reflection\ClassReflection $classReflection,
        string $methodName,
        string $parameterName,
        Reflection\ClassReflection $classUsedInTypeDeclaration
    ): string {
        if ($classReflection->isAnonymous()) {
            return \sprintf(
                'Method %s() in anonymous class has a parameter $%s with a type declaration of %s, but containers should not be injected.',
                $methodName,
                $parameterName,
                $classUsedInTypeDeclaration->getName(),
            );
        }

        return \sprintf(
            'Method %s::%s() has a parameter $%s with a type declaration of %s, but containers should not be injected.',
            $classReflection->getName(),
            $methodName,
            $parameterName,
            $classUsedInTypeDeclaration->getName(),
        );
    }
}
