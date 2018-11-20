<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullablReturnTypeDeclaration;

$foo = static function (): string {
    return 'Hello';
};
