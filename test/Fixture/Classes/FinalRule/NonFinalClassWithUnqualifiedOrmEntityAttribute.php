<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRule;

#[ORM\Entity()]
class NonFinalClassWithUnqualifiedOrmEntityAttribute
{
}
