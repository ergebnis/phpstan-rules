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

namespace Localheinz\PHPStan\Rules\Closures;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;

final class NoParameterWithNullDefaultValueRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\Closure::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node instanceof Node\Expr\Closure) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Expr\Closure::class,
                \get_class($node)
            ));
        }

        if (0 === \count($node->params)) {
            return [];
        }

        $params = \array_filter($node->params, static function (Node\Param $node): bool {
            if (!$node->default instanceof Node\Expr\ConstFetch) {
                return false;
            }

            return 'null' === $node->default->name->toLowerString();
        });

        if (0 === \count($params)) {
            return [];
        }

        return \array_map(static function (Node\Param $node): string {
            /** @var Node\Expr\Variable $variable */
            $variable = $node->var;

            /** @var string $parameterName */
            $parameterName = $variable->name;

            return \sprintf(
                'Closure has parameter $%s with null as default value.',
                $parameterName
            );
        }, $params);
    }
}
