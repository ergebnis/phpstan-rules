<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Success;

interface InterfaceWithMethodWithParameterWithOtherTypeDeclaration
{
    public function method(ContainerInterface $container): void;
}
