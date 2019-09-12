<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

use Zend\ServiceManager;

final class ClassWithMethodWithParameterWithServiceLocatorInterfaceAsTypeDeclaration
{
    public function method(ServiceManager\ServiceLocatorInterface $container): void
    {
    }
}
