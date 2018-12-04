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

final class NoConstructorParameterWithDefaultValueRule implements Rule
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
        if ('__construct' !== $node->name->toLowerString()) {
            return [];
        }

        if (0 === \count($node->params)) {
            return [];
        }

        $params = \array_filter($node->params, static function (Node\Param $node): bool {
            return null !== $node->default;
        });

        if (0 === \count($params)) {
            return [];
        }

        /** @var Reflection\ClassReflection $classReflection */
        $classReflection = $scope->getClassReflection();

        if ($classReflection->isAnonymous()) {
            return \array_map(static function (Node\Param $node): string {
                /** @var Node\Expr\Variable $variable */
                $variable = $node->var;

                /** @var string $parameterName */
                $parameterName = $variable->name;

                return \sprintf(
                    'Constructor in anonymous class has parameter $%s with default value.',
                    $parameterName
                );
            }, $params);
        }

        $className = $classReflection->getName();

        return \array_map(static function (Node\Param $node) use ($className): string {
            /** @var Node\Expr\Variable $variable */
            $variable = $node->var;

            /** @var string $parameterName */
            $parameterName = $variable->name;

            return \sprintf(
                'Constructor in %s has parameter $%s with default value.',
                $className,
                $parameterName
            );
        }, $params);
    }
}
