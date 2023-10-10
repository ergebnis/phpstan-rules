<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRuleWithAttributes\Success;

#[\Doctrine\ORM\Mapping\Entity()]
class NonFinalClassWithQualifiedDoctrineOrmMappingEntityAttribute
{
}
