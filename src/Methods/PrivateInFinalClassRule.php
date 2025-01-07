<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
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
use PHPUnit\Framework;

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

        if (self::methodHasPhpUnitAttributeWhichRequiresProtectedVisibility($node)) {
            return [];
        }

        $methodName = $node->name->toString();

        if (self::methodIsDeclaredByParentClass($containingClass, $methodName)) {
            return [];
        }

        if (self::methodIsDeclaredByTrait($containingClass, $methodName)) {
            return [];
        }

        /** @var Reflection\ClassReflection $classReflection */
        $classReflection = $scope->getClassReflection();

        if ($classReflection->isAnonymous()) {
            $message = \sprintf(
                'Method %s() in anonymous class is protected, but since the containing class is final, it can be private.',
                $node->name->name,
            );

            return [
                Rules\RuleErrorBuilder::message($message)
                    ->identifier(ErrorIdentifier::privateInFinalClass()->toString())
                    ->build(),
            ];
        }

        $message = \sprintf(
            'Method %s::%s() is protected, but since the containing class is final, it can be private.',
            $containingClass->getName(),
            $methodName,
        );

        return [
            Rules\RuleErrorBuilder::message($message)
                ->identifier(ErrorIdentifier::privateInFinalClass()->toString())
                ->build(),
        ];
    }

    private static function methodHasPhpUnitAttributeWhichRequiresProtectedVisibility(Node\Stmt\ClassMethod $node): bool
    {
        $attributes = [
            Framework\Attributes\Before::class,
            Framework\Attributes\After::class,
            Framework\Attributes\PostCondition::class,
            Framework\Attributes\PreCondition::class,
        ];

        foreach ($node->attrGroups as $attrGroup) {
            foreach ($attrGroup->attrs as $attribute) {
                if (\in_array($attribute->name->toString(), $attributes, true)) {
                    return true;
                }
            }
        }

        return false;
    }

    private static function methodIsDeclaredByParentClass(
        Reflection\ClassReflection $containingClass,
        string $methodName
    ): bool {
        $parentClass = $containingClass->getNativeReflection()->getParentClass();

        if (!$parentClass instanceof \ReflectionClass) {
            return false;
        }

        if (!$parentClass->hasMethod($methodName)) {
            return false;
        }

        return true;
    }

    private static function methodIsDeclaredByTrait(
        Reflection\ClassReflection $containingClass,
        string $methodName
    ): bool {
        foreach ($containingClass->getTraits() as $trait) {
            if ($trait->hasMethod($methodName)) {
                return true;
            }
        }

        return false;
    }
}
