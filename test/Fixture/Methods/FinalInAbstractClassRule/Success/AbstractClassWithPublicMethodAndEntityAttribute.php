<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

use Doctrine\ORM;

#[ORM\Mapping\Entity]
abstract class AbstractClassWithPublicMethodAndEntityAttribute
{
    public function method(): void
    {
    }
}
