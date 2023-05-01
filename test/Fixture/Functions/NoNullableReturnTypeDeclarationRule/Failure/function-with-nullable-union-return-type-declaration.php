<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\Failure;

function foo(): string|null
{
    return 'Hello';
}
