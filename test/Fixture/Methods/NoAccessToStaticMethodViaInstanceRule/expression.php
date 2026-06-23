<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoAccessToStaticMethodViaInstanceRule;

(new ClassWithStaticMethod())::bar();
