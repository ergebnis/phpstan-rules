<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2020 Andreas Möller
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

final class FinalInAbstractClassRule implements Rule
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

        if (!$containingClass->isAbstract()) {
            return [];
        }

        if ($containingClass->isInterface()) {
            return [];
        }

        if ($node->isAbstract()) {
            return [];
        }

        if ($node->isFinal()) {
            return [];
        }

        if ($node->isPrivate()) {
            return [];
        }

        if ('__construct' === $node->name->name) {
            return [];
        }

        return [
            \sprintf(
                'Method %s::%s() is not final, but since the containing class is abstract, it should be.',
                $containingClass->getName(),
                $node->name->toString()
            ),
        ];
    }
}
