<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Success;

interface InterfaceWithMethodWithoutParameter
{
    public function method(): void;
}
