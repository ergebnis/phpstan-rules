<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

use Psr\Container;

interface InterfaceWithMethodWithParameterWithContainerInterfaceAsTypeDeclaration
{
    public function method(Container\ContainerInterface $container): void;
}
