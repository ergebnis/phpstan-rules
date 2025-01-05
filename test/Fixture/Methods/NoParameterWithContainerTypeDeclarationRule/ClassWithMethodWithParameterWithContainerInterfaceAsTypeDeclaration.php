<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

use Psr\Container;

final class ClassWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration
{
    public function method(Container\ContainerInterface $container): void
    {
    }
}
