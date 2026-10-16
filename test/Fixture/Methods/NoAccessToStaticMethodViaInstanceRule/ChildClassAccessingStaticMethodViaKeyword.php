<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoAccessToStaticMethodViaInstanceRule;

class ChildClassAccessingStaticMethodViaKeyword extends ClassWithStaticMethod
{
    public function accessViaSelf(): string
    {
        return self::bar();
    }

    public function accessViaStatic(): string
    {
        return static::bar();
    }

    public function accessViaParent(): string
    {
        return parent::bar();
    }
}
