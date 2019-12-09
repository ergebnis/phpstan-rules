<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

use Psr\Container;

/** @var Container\ContainerInterface $container */
new class($container) {
    public function __construct(Container\ContainerInterface $container)
    {
    }
};
