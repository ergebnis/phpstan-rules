<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

/**
 * @ORM\Mapping\Entity
 */
abstract class AbstractClassWithPublicMethodAndOrmMappingEntityAnnotationInMultilineDocBlock
{
    public function method(): void
    {
    }
}
