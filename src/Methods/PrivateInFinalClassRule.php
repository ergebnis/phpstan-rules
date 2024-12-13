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

/**
 * @implements Rules\Rule<Node\Stmt\ClassMethod>
 */
final class PrivateInFinalClassRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
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

        $message = \sprintf(
            'Method %s::%s() is protected, but since the containing class is final, it can be private.',
            $containingClass->getName(),
            $methodName,
        );

        $ruleErrorBuilder = Rules\RuleErrorBuilder::message($message);

        return [
            $ruleErrorBuilder
                ->identifier(ErrorIdentifier::privateInFinalClass()->toString())
                ->build(),
        ];
    }
}
