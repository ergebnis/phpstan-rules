<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
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

final class NoNullableReturnTypeDeclarationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    /**
     * @param Node\Stmt\ClassMethod $node
     * @param Scope                 $scope
     *
     * @return array
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $returnType = $node->getReturnType();

        if (!$returnType instanceof Node\NullableType) {
            return [];
        }

        /** @var Reflection\ClassReflection $classReflection */
        $classReflection = $scope->getClassReflection();

        if ($classReflection->isAnonymous()) {
            return [
                \sprintf(
                    'Method "%s()" in anonymous class should not have a nullable return type declaration.',
                    $node->name->name
                ),
            ];
        }

        return [
            \sprintf(
                'Method "%s::%s()" should not have a nullable return type declaration.',
                $classReflection->getName(),
                $node->name->name
            ),
        ];
    }
}
