<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

(new ClassWithConstant())::BAZ;

(new ClassWithConstant())::class;
