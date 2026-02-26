<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Properties;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Reflection;
use PHPStan\Rules;

/**
 * @implements Rules\Rule<Node\Expr\StaticPropertyFetch>
 */
final class NoAccessToStaticPropertyViaInstanceRule implements Rules\Rule
{
    private Reflection\ReflectionProvider $reflectionProvider;

    public function __construct(Reflection\ReflectionProvider $reflectionProvider)
    {
        $this->reflectionProvider = $reflectionProvider;
    }

    public function getNodeType(): string
    {
        return Node\Expr\StaticPropertyFetch::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
        if ($node->class instanceof Node\Name) {
            return [];
        }

        if (!$node->name instanceof Node\VarLikeIdentifier) {
            return [];
        }

        $classNames = $scope->getType($node->class)->getObjectClassNames();

        if ([] === $classNames) {
            return [];
        }

        if (
            !$node->class instanceof Node\Expr\Variable
            || 'this' !== $node->class->name
        ) {
            if ($this->isAnonymousClass(...$classNames)) {
                return [];
            }
        }

        $message = \sprintf(
            'Static property $%s should be accessed via class name, not via instance.',
            $node->name->toString(),
        );

        return [
            Rules\RuleErrorBuilder::message($message)
                ->identifier(ErrorIdentifier::noAccessToStaticMemberViaInstance()->toString())
                ->build(),
        ];
    }

    private function isAnonymousClass(string ...$classNames): bool
    {
        foreach ($classNames as $className) {
            if (
                $this->reflectionProvider->hasClass($className)
                && $this->reflectionProvider->getClass($className)->isAnonymous()
            ) {
                return true;
            }
        }

        return false;
    }
}
