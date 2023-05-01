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

final class NoParameterWithNullableTypeDeclarationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(
        Node $node,
        Scope $scope,
    ): array {
        if (!$node instanceof Node\Stmt\ClassMethod) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\ClassMethod::class,
                $node::class,
            ));
        }

        if (0 === \count($node->params)) {
            return [];
        }

        $params = \array_filter($node->params, static function (Node\Param $node): bool {
            return self::isNullable($node);
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
                    'Method %s() in anonymous class has parameter $%s with a nullable type declaration.',
                    $methodName,
                    $parameterName,
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
                'Method %s::%s() has parameter $%s with a nullable type declaration.',
                $className,
                $methodName,
                $parameterName,
            );
        }, $params);
    }

    private static function isNullable(Node\Param $node): bool
    {
        if ($node->type instanceof Node\NullableType) {
            return true;
        }

        if ($node->type instanceof Node\UnionType) {
            foreach ($node->type->types as $type) {
                if (!$type instanceof Node\Identifier) {
                    continue;
                }

                if ('null' !== $type->toString()) {
                    continue;
                }

                return true;
            }
        }

        return false;
    }
}
