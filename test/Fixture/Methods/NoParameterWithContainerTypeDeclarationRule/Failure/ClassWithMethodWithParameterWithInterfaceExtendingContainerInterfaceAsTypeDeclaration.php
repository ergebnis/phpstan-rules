<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

final class ClassWithMethodWithParameterWithInterfaceExtendingContainerInterfaceAsTypeDeclaration
{
    public function method(InterfaceExtendingContainerInterface $container): void
    {
    }
}
