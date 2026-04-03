<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Properties\NoAccessToStaticPropertyViaInstanceRule;

$instance = new ClassWithStaticProperty();

ClassWithStaticProperty::$BAR;

/** @var class-string<ClassWithStaticProperty> $className */
$className = ClassWithStaticProperty::class;
$className::$BAR;

$instance::$BAR;
