<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

$foo = new class() {
    protected function method(): void
    {
    }
};
