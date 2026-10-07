<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Properties\NoAccessToStaticPropertyViaInstanceRule;

(new ClassWithStaticProperty())::$BAR;
