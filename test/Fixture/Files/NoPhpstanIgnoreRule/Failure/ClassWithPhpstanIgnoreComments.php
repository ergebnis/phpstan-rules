<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Files\NoPhpstanIgnoreRule\Failure;

class ClassWithPhpstanIgnoreComments
{
    public function foo(): void
    {
        // @phpstan-ignore variable.undefined
        echo $undefined;

        /* @phpstan-ignore variable.undefined */
        echo $undefined;

        /** @phpstan-ignore variable.undefined */
        echo $undefined;

        echo $undefined; // @phpstan-ignore-line

        echo $undefined; /* @phpstan-ignore-line */

        // @phpstan-ignore-next-line
        echo $undefined;

        /* @phpstan-ignore-next-line */
        echo $undefined;

        /** @phpstan-ignore-next-line */
        echo $undefined;
    }
}
