<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Methods;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;

final class PrivateInFinalClassRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node instanceof Node\Stmt\ClassMethod) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\ClassMethod::class,
                \get_class($node)
            ));
        }

        /** @var Reflection\ClassReflection $containingClass */
        $containingClass = $scope->getClassReflection();

        if (!$containingClass->isFinal()) {
            return [];
        }

        if ($node->isPublic()) {
            return [];
        }

        if ($node->isPrivate()) {
            return [];
        }

        $methodName = $node->name->toString();

        $parentClass = $containingClass->getNativeReflection()->getParentClass();

        if ($parentClass instanceof \ReflectionClass && $parentClass->hasMethod($methodName)) {
            $parentMethod = $parentClass->getMethod($methodName);

            if ($parentMethod->isProtected()) {
                return [];
            }
        }

        return [
            \sprintf(
                'Method %s::%s() is protected, but since the containing class is final, it can be private.',
                $containingClass->getName(),
                $methodName
            ),
        ];
    }
}
