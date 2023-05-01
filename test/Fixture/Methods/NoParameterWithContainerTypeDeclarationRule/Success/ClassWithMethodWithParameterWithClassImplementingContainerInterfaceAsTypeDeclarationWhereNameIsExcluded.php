<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Success;

use Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure\ClassImplementingContainerInterface;

final class ClassWithMethodWithParameterWithClassImplementingContainerInterfaceAsTypeDeclarationWhereNameIsExcluded
{
    public function loadExtension(ClassImplementingContainerInterface $container): void
    {
    }
}
