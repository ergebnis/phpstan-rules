<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

use Doctrine\ORM;

#[ORM\Mapping\Embeddable]
abstract class AbstractClassWithPublicMethodAndEmbeddableAttribute
{
    public function method(): void
    {
    }
}
