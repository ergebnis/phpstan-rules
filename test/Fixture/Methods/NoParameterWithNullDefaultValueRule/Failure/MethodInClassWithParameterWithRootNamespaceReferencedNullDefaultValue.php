<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure;

final class MethodInClassWithParameterWithRootNamespaceReferencedNullDefaultValue
{
    public function foo($bar = \null)
    {
        return $bar;
    }
}
