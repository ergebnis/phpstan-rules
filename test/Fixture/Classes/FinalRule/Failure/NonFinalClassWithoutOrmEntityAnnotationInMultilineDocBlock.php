<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRule\Failure;

/**
 * @ORM\Table(name="hmm")
 *
 * @OrM\eNtItY
 */
class NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock
{
}
