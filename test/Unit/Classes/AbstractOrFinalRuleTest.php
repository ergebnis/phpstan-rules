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

namespace Localheinz\PHPStan\Rules\Test\Unit\Classes;

use Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule;
use Localheinz\Test\Util\Helper;
use PhpParser\Node;
use PhpParser\NodeAbstract;
use PHPStan\Analyser;
use PHPStan\Rules;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;
use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 */
final class AbstractOrFinalRuleTest extends RuleTestCase
{
    use Helper;

    public function testImplementsRule(): void
    {
        $this->assertClassImplementsInterface(Rules\Rule::class, AbstractOrFinalRule::class);
    }

    public function testGetNodeTypeReturnsClass(): void
    {
        $rule = new AbstractOrFinalRule();

        $this->assertSame(Node\Stmt\Class_::class, $rule->getNodeType());
    }

    public function testProcessNodeReturnsEmptyArrayWhenClassHasNoNamespacedName(): void
    {
        $node = $this->prophesize(Node\Stmt\Class_::class);

        $rule = new AbstractOrFinalRule();

        $errors = $rule->processNode(
            $node->reveal(),
            $this->prophesize(Analyser\Scope::class)->reveal()
        );

        $this->assertEmpty($errors);
    }

    public function testProcessNodeRejectsNodeWhenItIsNotClassStatement(): void
    {
        $node = $this->prophesize(NodeAbstract::class);

        $rule = new AbstractOrFinalRule();

        $this->expectException(ShouldNotHappenException::class);

        $rule->processNode(
            $node->reveal(),
            $this->prophesize(Analyser\Scope::class)->reveal()
        );
    }

    public function testProcessNodeReturnsEmptyArrayWhenClassIsAbstract(): void
    {
        $node = $this->prophesize(Node\Stmt\Class_::class);

        $node->namespacedName = new Node\Name($this->faker()->word);

        $node
            ->isAbstract()
            ->shouldBeCalled()
            ->willReturn(true);

        $rule = new AbstractOrFinalRule();

        $errors = $rule->processNode(
            $node->reveal(),
            $this->prophesize(Analyser\Scope::class)->reveal()
        );

        $this->assertEmpty($errors);
    }

    public function testProcessNodeReturnsEmptyArrayWhenClassIsFinal(): void
    {
        $node = $this->prophesize(Node\Stmt\Class_::class);

        $node->namespacedName = new Node\Name($this->faker()->word);

        $node
            ->isAbstract()
            ->shouldBeCalled()
            ->willReturn(false);

        $node
            ->isFinal()
            ->shouldBeCalled()
            ->willReturn(true);

        $rule = new AbstractOrFinalRule();

        $errors = $rule->processNode(
            $node->reveal(),
            $this->prophesize(Analyser\Scope::class)->reveal()
        );

        $this->assertEmpty($errors);
    }

    public function testProcessNodeReturnsEmptyArrayWhenClassIsNeitherAbstractNorFinalAndExcluded(): void
    {
        $faker = $this->faker();

        $excludedClassNames = $faker->unique()->words(10);

        $fullyQualifiedClassName = $faker->randomElement($excludedClassNames);

        $node = $this->prophesize(Node\Stmt\Class_::class);

        $node->namespacedName = new Node\Name($fullyQualifiedClassName);

        $node
            ->isAbstract()
            ->willReturn(false);

        $node
            ->isFinal()
            ->willReturn(false);

        $rule = new AbstractOrFinalRule($excludedClassNames);

        $errors = $rule->processNode(
            $node->reveal(),
            $this->prophesize(Analyser\Scope::class)->reveal()
        );

        $this->assertEmpty($errors);
    }

    public function testProcessNodeReturnsArrayWithErrorWhenClassIsNeitherAbstractNorFinalAndNotExcluded(): void
    {
        $fullyQualifiedClassName = $this->faker()->word;

        $node = $this->prophesize(Node\Stmt\Class_::class);

        $node
            ->isAbstract()
            ->shouldBeCalled()
            ->willReturn(false);

        $node
            ->isFinal()
            ->shouldBeCalled()
            ->willReturn(false);

        $node->namespacedName = new Node\Name($fullyQualifiedClassName);

        $rule = new AbstractOrFinalRule();

        $errors = $rule->processNode(
            $node->reveal(),
            $this->prophesize(Analyser\Scope::class)->reveal()
        );

        $this->assertCount(1, $errors);

        $error = \array_shift($errors);

        $expected = \sprintf(
            'Class "%s" should be marked as abstract or final.',
            $fullyQualifiedClassName
        );

        $this->assertSame($expected, $error);
    }

    protected function getRule(): Rule
    {
        return new AbstractOrFinalRule();
    }
}
