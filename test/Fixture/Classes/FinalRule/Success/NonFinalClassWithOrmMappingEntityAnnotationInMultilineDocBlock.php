<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRule\Success;

/**
 * @ORM\Mapping\Table(name="hmm")
 *
 * @ORM\Mapping\Entity
 */
class NonFinalClassWithOrmMappingEntityAnnotationInMultilineDocBlock
{
}
