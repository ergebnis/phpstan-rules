<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoAccessToStaticMethodViaInstanceRule;

$instance = new ClassWithStaticMethod();

ClassWithStaticMethod::bar();

/** @var class-string<ClassWithStaticMethod> $className */
$className = ClassWithStaticMethod::class;
$className::bar();

$instance::bar();
