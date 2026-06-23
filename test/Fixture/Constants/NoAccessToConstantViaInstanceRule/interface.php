<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

$instance = new ClassImplementingInterfaceWithConstant();

InterfaceWithConstant::QUX;
ClassImplementingInterfaceWithConstant::QUX;

$instance::QUX;
