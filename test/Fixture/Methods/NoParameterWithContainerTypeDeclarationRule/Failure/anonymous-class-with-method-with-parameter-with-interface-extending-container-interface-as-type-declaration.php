<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

/** @var InterfaceExtendingContainerInterface $container */
new class($container) {
    public function __construct(InterfaceExtendingContainerInterface $container)
    {
    }
};
