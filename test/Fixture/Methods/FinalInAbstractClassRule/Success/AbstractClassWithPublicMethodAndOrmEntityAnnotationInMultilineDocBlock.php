<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

/**
 * @ORM\Entity
 */
abstract class AbstractClassWithPublicMethodAndOrmEntityAnnotationInMultilineDocBlock
{
    public function method(): void
    {
    }
}
