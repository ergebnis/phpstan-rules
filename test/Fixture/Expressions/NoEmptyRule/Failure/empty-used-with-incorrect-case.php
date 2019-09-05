<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoEmptuRule\Failure;

if (eMpTy($foo)) {
    echo 'Hello!';
}
