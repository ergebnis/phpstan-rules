<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRule;

use Doctrine\ORM;

#[ORM\Mapping\Entity()]
class ClassWithQualifiedOrmMappingEntityAttribute
{
}
