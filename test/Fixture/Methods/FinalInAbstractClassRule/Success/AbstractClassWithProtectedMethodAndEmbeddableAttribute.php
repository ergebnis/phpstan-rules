<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

use Doctrine\ORM;

#[ORM\Mapping\Embeddable]
abstract class AbstractClassWithProtectedMethodAndEmbeddableAttribute
{
    protected function method(): void
    {
    }
}
