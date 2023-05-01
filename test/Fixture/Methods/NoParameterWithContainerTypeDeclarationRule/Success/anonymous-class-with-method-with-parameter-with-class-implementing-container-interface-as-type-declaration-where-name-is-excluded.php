<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule\Failure;

/** @var ClassImplementingContainerInterface $container */
new class($container) {
    public function loadExtension(ClassImplementingContainerInterface $container): void
    {
    }
};
