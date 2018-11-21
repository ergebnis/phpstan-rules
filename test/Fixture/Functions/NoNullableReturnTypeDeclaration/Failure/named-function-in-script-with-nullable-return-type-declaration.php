<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullablReturnTypeDeclaration\Failure;

function foo(): ?string
{
    return 'Hello';
}
