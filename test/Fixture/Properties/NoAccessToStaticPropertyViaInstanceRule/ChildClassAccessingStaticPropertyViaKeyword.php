<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Properties\NoAccessToStaticPropertyViaInstanceRule;

class ChildClassAccessingStaticPropertyViaKeyword extends ClassWithStaticProperty
{
    public function accessViaSelf(): string
    {
        return self::$BAR;
    }

    public function accessViaStatic(): string
    {
        return static::$BAR;
    }

    public function accessViaParent(): string
    {
        return parent::$BAR;
    }
}
