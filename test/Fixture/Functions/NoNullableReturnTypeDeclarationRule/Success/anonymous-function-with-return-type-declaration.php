<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\Success;

$foo = function (): string {
    return 'Hello';
};
