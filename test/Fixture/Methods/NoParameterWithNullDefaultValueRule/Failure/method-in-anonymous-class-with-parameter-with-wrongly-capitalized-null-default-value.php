<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

new class() {
    public function foo($bar = NuLl)
    {
        return $bar;
    }
};
