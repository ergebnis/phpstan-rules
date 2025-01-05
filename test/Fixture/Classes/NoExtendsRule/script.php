<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRule;

$foo = new class() {
};

$bar = new class() extends OtherClass {
};
