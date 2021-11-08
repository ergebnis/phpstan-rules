<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRuleWithAttributes\Success;

use Doctrine\ORM\Mapping;

#[Mapping\Entity]
class NonFinalClassWithQualifiedMappingEntityAttribute
{
}
