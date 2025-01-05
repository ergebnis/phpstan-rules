<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

use Psr\Container;

interface InterfaceExtendingContainerInterface extends Container\ContainerInterface
{
}
