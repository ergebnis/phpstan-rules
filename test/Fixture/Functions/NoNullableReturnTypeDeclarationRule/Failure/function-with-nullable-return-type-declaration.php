<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\Failure;

function foo(): ?string
{
    return 'Hello';
}
