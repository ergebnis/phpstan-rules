<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

trait TraitWithProtectedMethod
{
    protected function method(): void
    {
    }
}
