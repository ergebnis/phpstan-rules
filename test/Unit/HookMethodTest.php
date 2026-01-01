<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Unit;

use Ergebnis\PHPStan\Rules\ClassName;
use Ergebnis\PHPStan\Rules\HasContent;
use Ergebnis\PHPStan\Rules\HookMethod;
use Ergebnis\PHPStan\Rules\Invocation;
use Ergebnis\PHPStan\Rules\MethodName;
use Ergebnis\PHPStan\Rules\Test;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\HookMethod
 *
 * @uses \Ergebnis\PHPStan\Rules\ClassName
 * @uses \Ergebnis\PHPStan\Rules\HasContent
 * @uses \Ergebnis\PHPStan\Rules\Invocation
 * @uses \Ergebnis\PHPStan\Rules\MethodName
 */
final class HookMethodTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testCreateReturnsHookMethod(): void
    {
        $faker = self::faker();

        $className = ClassName::fromString(self::class);
        $methodName = MethodName::fromString(__FUNCTION__);
        $invocation = $faker->randomElement([
            Invocation::last(),
            Invocation::any(),
            Invocation::first(),
        ]);
        $hasContent = $faker->randomElement([
            HasContent::maybe(),
            HasContent::no(),
            HasContent::yes(),
        ]);

        $hookMethod = HookMethod::create(
            $className,
            $methodName,
            $invocation,
            $hasContent,
        );

        self::assertSame($className, $hookMethod->className());
        self::assertSame($methodName, $hookMethod->methodName());
        self::assertSame($invocation, $hookMethod->invocation());
        self::assertSame($hasContent, $hookMethod->hasContent());
    }
}
