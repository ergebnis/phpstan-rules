<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

use Zend\ServiceManager;

interface InterfaceWithMethodWithParameterWithServiceLocatorInterfaceAsTypeDeclaration
{
    public function method(ServiceManager\ServiceLocatorInterface $container): void;
}
