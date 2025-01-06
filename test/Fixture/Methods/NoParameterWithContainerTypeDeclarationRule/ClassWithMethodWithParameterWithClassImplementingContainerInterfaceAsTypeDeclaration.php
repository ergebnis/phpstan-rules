<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

final class ClassWithMethodWithParameterWithClassImplementingContainerInterfaceAsTypeDeclaration
{
    public function method(ClassImplementingContainerInterface $container): void
    {
    }
}
