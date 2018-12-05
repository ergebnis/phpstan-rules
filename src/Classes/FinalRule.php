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

namespace Localheinz\PHPStan\Rules\Classes;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

final class FinalRule implements Rule
{
    /**
     * @var bool
     */
    private $allowAbstractClasses;

    /**
     * @var string[]
     */
    private $classesNotRequiredToBeAbstractOrFinal;

    /**
     * @var string
     */
    private $errorMessageTemplate = 'Class %s is not final.';

    /**
     * @param bool     $allowAbstractClasses
     * @param string[] $classesNotRequiredToBeAbstractOrFinal
     */
    public function __construct(bool $allowAbstractClasses, array $classesNotRequiredToBeAbstractOrFinal)
    {
        $this->allowAbstractClasses = $allowAbstractClasses;
        $this->classesNotRequiredToBeAbstractOrFinal = \array_map(static function (string $classNotRequiredToBeAbstractOrFinal): string {
            return $classNotRequiredToBeAbstractOrFinal;
        }, $classesNotRequiredToBeAbstractOrFinal);

        if (true === $allowAbstractClasses) {
            $this->errorMessageTemplate = 'Class %s is neither abstract nor final.';
        }
    }

    public function getNodeType(): string
    {
        return Node\Stmt\Class_::class;
    }

    /**
     * @param Node\Stmt\Class_ $node
     * @param Scope            $scope
     *
     * @return array
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!isset($node->namespacedName)
            || \in_array($node->namespacedName->toString(), $this->classesNotRequiredToBeAbstractOrFinal, true)
        ) {
            return [];
        }

        if (true === $this->allowAbstractClasses && $node->isAbstract()) {
            return [];
        }

        if ($node->isFinal()) {
            return [];
        }

        return [
            \sprintf(
                $this->errorMessageTemplate,
                $node->namespacedName
            ),
        ];
    }
}
