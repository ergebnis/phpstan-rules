<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

class ChildClassAccessingStaticConstantViaKeyword extends ClassWithConstant
{
    public function accessViaSelf(): string
    {
        return self::BAZ;
    }

    public function accessViaStatic(): string
    {
        return static::BAZ;
    }

    public function accessViaParent(): string
    {
        return parent::BAZ;
    }
}
