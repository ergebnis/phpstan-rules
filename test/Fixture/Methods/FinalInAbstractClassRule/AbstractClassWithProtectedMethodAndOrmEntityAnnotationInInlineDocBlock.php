<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

/** @ORM\Entity */
abstract class AbstractClassWithProtectedMethodAndOrmEntityAnnotationInInlineDocBlock
{
    protected function method(): void
    {
    }
}
