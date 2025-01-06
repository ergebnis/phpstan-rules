<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

final class ClassWithMethodWithParameterWithInterfaceExtendingContainerInterfaceAsTypeDeclaration
{
    public function method(InterfaceExtendingContainerInterface $container): void
    {
    }
}
