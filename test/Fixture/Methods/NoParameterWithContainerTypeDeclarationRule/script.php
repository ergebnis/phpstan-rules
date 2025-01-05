<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

use Psr\Container;

$foo = new class() {
    public function __construct()
    {
    }
};

$bar = new class() {
    public function __construct(ContainerInterface $container)
    {
    }
};

$baz = new class() {
    public function loadExtension(ClassImplementingContainerInterface $container): void
    {
    }
};

/** @var ClassImplementingContainerInterface $container */
$qux = new class($container) {
    public function __construct(ClassImplementingContainerInterface $container)
    {
    }
};

/** @var Container\ContainerInterface $container */
$quux = new class($container) {
    public function __construct(Container\ContainerInterface $container)
    {
    }
};

/** @var InterfaceExtendingContainerInterface $container */
new class($container) {
    public function __construct(InterfaceExtendingContainerInterface $container)
    {
    }
};
