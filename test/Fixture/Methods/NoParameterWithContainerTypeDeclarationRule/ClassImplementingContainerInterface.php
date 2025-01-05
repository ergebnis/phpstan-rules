<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

use Psr\Container;

final class ClassImplementingContainerInterface implements Container\ContainerInterface
{
    public function get($id): void
    {
    }

    public function has($id): bool
    {
    }
}
