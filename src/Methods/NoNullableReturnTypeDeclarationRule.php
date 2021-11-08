<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2021 Andreas Möller
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

final class NoNullableReturnTypeDeclarationRule implements Rule
{
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
                \get_class($node)
            ));
        }

        $returnType = $node->getReturnType();

        if (!$returnType instanceof Node\NullableType) {
            return [];
        }

        /** @var Reflection\ClassReflection $classReflection */
        $classReflection = $scope->getClassReflection();

        if ($classReflection->isAnonymous()) {
            return [
                \sprintf(
                    'Method %s() in anonymous class has a nullable return type declaration.',
                    $node->name->name
                ),
            ];
        }

        return [
            \sprintf(
                'Method %s::%s() has a nullable return type declaration.',
                $classReflection->getName(),
                $node->name->name
            ),
        ];
    }
}
