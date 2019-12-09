<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

use Zend\ServiceManager;

/** @var ServiceManager\ServiceLocatorInterface $container */
new class($container) {
    public function __construct(ServiceManager\ServiceLocatorInterface $container)
    {
    }
};
