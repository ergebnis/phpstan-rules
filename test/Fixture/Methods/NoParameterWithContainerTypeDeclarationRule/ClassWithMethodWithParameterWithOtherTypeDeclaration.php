<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

final class ClassWithMethodWithParameterWithOtherTypeDeclaration
{
    public function method(ContainerInterface $container): void
    {
    }
}
