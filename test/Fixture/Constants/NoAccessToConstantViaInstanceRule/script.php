<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

$instance = new ClassWithConstant();

ClassWithConstant::BAZ;

/** @var class-string<ClassWithConstant> $className */
$className = ClassWithConstant::class;
$className::BAZ;

$instance::BAZ;

$instance::class;
