<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoEmptuRule\Failure;

if (eMpTy($foo)) {
    echo 'Hello!';
}
