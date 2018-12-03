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

final class NoParameterWithNullableTypeDeclarationRule implements Rule
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
        if (0 === \count($node->params)) {
            return [];
        }

        $params = \array_filter($node->params, static function (Node\Param $node): bool {
            return $node->type instanceof Node\NullableType;
        });

        if (0 === \count($params)) {
            return [];
        }

        $methodName = $node->name->toString();

        /** @var Reflection\ClassReflection $classReflection */
        $classReflection = $scope->getClassReflection();

        if ($classReflection->isAnonymous()) {
            return \array_map(static function (Node\Param $node) use ($methodName): string {
                /** @var Node\Expr\Variable $variable */
                $variable = $node->var;

                /** @var string $parameterName */
                $parameterName = $variable->name;

                return \sprintf(
                    'Parameter $%s of method %s() in anonymous class should not have a nullable type declaration.',
                    $parameterName,
                    $methodName
                );
            }, $params);
        }

        $className = $classReflection->getName();

        return \array_map(static function (Node\Param $node) use ($className, $methodName): string {
            /** @var Node\Expr\Variable $variable */
            $variable = $node->var;

            /** @var string $parameterName */
            $parameterName = $variable->name;

            return \sprintf(
                'Parameter $%s of method %s::%s() should not have a nullable type declaration.',
                $parameterName,
                $className,
                $methodName
            );
        }, $params);
    }
}
