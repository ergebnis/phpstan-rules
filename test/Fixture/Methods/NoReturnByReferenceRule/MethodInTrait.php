<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoReturnByReferenceRule;

trait MethodInTrait
{
    public function foo($bar)
    {
        return $bar;
    }
}
