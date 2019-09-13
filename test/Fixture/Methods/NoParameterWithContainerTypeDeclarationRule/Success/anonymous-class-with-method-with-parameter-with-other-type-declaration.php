<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Success;

new class() {
    public function __construct(ContainerInterface $container)
    {
    }
};
