<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullablReturnTypeDeclaration;

$foo = function (): ?string {
    return 'Hello';
};
