<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

interface InterfaceWithMethodWithParameterWithOtherTypeDeclaration
{
    public function method(ContainerInterface $container): void;
}
