<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Methods;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Reflection;
use PHPStan\Rules;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rules\Rule<Node\Stmt\ClassMethod>
 */
final class FinalInAbstractClassRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
        if (!$node instanceof Node\Stmt\ClassMethod) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\ClassMethod::class,
                \get_class($node),
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

        $ruleErrorBuilder = Rules\RuleErrorBuilder::message(\sprintf(
            'Method %s::%s() is not final, but since the containing class is abstract, it should be.',
            $containingClass->getName(),
            $node->name->toString(),
        ));

        return [
            $ruleErrorBuilder->identifier(ErrorIdentifier::finalInAbstractClass()->toString())->build(),
        ];
    }
}
