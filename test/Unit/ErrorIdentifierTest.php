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

namespace Ergebnis\PHPStan\Rules\Test\Unit;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class ErrorIdentifierTest extends Framework\TestCase
{
    public function testDeclareStrictTypesReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::declareStrictTypes();

        self::assertSame('ergebnis.declareStrictTypes', $errorIdentifier->toString());
    }

    public function testFinalInAbstractClassReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::finalInAbstractClass();

        self::assertSame('ergebnis.finalInAbstractClass', $errorIdentifier->toString());
    }

    public function testFinalReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::final();

        self::assertSame('ergebnis.final', $errorIdentifier->toString());
    }

    public function testNoCompactReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noCompact();

        self::assertSame('ergebnis.noCompact', $errorIdentifier->toString());
    }

    public function testNoConstructorParameterWithDefaultValueReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noConstructorParameterWithDefaultValue();

        self::assertSame('ergebnis.noConstructorParameterWithDefaultValue', $errorIdentifier->toString());
    }

    public function testNoErrorSuppressionReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noErrorSuppression();

        self::assertSame('ergebnis.noErrorSuppression', $errorIdentifier->toString());
    }

    public function testNoExtendsReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noExtends();

        self::assertSame('ergebnis.noExtends', $errorIdentifier->toString());
    }

    public function testNoEvalReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noEval();

        self::assertSame('ergebnis.noEval', $errorIdentifier->toString());
    }

    public function testNoIssetReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noIsset();

        self::assertSame('ergebnis.noIsset', $errorIdentifier->toString());
    }

    public function testNoNullableReturnTypeDeclarationReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noNullableReturnTypeDeclaration();

        self::assertSame('ergebnis.noNullableReturnTypeDeclaration', $errorIdentifier->toString());
    }

    public function testNoParameterWithContainerTypeDeclarationReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noParameterWithContainerTypeDeclaration();

        self::assertSame('ergebnis.noParameterWithContainerTypeDeclaration', $errorIdentifier->toString());
    }

    public function testNoParameterPassedByReferenceReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noParameterPassedByReference();

        self::assertSame('ergebnis.noParameterPassedByReference', $errorIdentifier->toString());
    }

    public function testNoParameterWithNullDefaultValueReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noParameterWithNullDefaultValue();

        self::assertSame('ergebnis.noParameterWithNullDefaultValue', $errorIdentifier->toString());
    }

    public function testNoParameterWithNullableTypeDeclarationReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noParameterWithNullableTypeDeclaration();

        self::assertSame('ergebnis.noParameterWithNullableTypeDeclaration', $errorIdentifier->toString());
    }

    public function testNoSwitchReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::noSwitch();

        self::assertSame('ergebnis.noSwitch', $errorIdentifier->toString());
    }

    public function testPrivateInFinalClassReturnsErrorIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::privateInFinalClass();

        self::assertSame('ergebnis.privateInFinalClass', $errorIdentifier->toString());
    }

    public function testTestCaseWithSuffixIdentifier(): void
    {
        $errorIdentifier = ErrorIdentifier::testCaseWithSuffix();

        self::assertSame('ergebnis.testCaseWithSuffix', $errorIdentifier->toString());
    }
}
