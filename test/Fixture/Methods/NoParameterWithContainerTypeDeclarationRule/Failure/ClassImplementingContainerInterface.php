<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

use Psr\Container;

final class ClassImplementingContainerInterface implements Container\ContainerInterface
{
    public function get($id): void
    {
    }

    public function has($id): void
    {
    }
}
