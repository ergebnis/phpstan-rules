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

namespace Ergebnis\PHPStan\Rules\Test\Unit\Documentation;

use Ergebnis\PHPStan\Rules\Documentation;
use Ergebnis\PHPStan\Rules\Test;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 */
final class CodeSampleTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testReportedReturnsCodeSampleThatIsReported(): void
    {
        $code = self::faker()->sentence();

        $codeSample = Documentation\CodeSample::reported($code);

        self::assertSame($code, $codeSample->code());
        self::assertTrue($codeSample->isReported());
    }

    public function testNotReportedReturnsCodeSampleThatIsNotReported(): void
    {
        $code = self::faker()->sentence();

        $codeSample = Documentation\CodeSample::notReported($code);

        self::assertSame($code, $codeSample->code());
        self::assertFalse($codeSample->isReported());
    }
}
