<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

use Psr\Container;

interface InterfaceWithMethodWithParameterWithContainerInterfaceAsTypeDeclarationWhereNameIsExcluded
{
    public function loadExtension(Container\ContainerInterface $container): void;
}
