<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Success;

interface InterfaceWithMethodWithoutParameter
{
    public function method(): void;
}
