<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullablReturnTypeDeclaration\Success;

$foo = function () {
    return 'Hello';
};
