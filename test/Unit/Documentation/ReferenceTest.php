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
use Ergebnis\Version;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Documentation\Reference
 */
final class ReferenceTest extends Framework\TestCase
{
    use Test\Util\Helper;

    /**
     * @dataProvider provideValueThatIsNotVersion
     */
    public function testFromPrettyVersionReturnsMainWhenPrettyVersionIsNotVersion(string $prettyVersion): void
    {
        $reference = Documentation\Reference::fromPrettyVersion($prettyVersion);

        self::assertSame('main', $reference->toString());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueThatIsNotVersion(): iterable
    {
        $values = [
            'branch' => 'dev-main',
            'branch-alias' => '2.16.x-dev',
            'commit' => 'e123a05b0a5d1f4c2b7c8d9e0f1a2b3c4d5e6f70',
            'empty' => '',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }

    /**
     * @dataProvider provideValueThatIsVersion
     */
    public function testFromPrettyVersionReturnsReferenceForVersionWhenPrettyVersionIsVersion(string $prettyVersion): void
    {
        $reference = Documentation\Reference::fromPrettyVersion($prettyVersion);

        self::assertSame($prettyVersion, $reference->toString());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueThatIsVersion(): iterable
    {
        $values = [
            'major-minor-patch' => '2.16.0',
            'pre-release' => '2.17.0-rc.1',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }

    public function testFromVersionReturnsReference(): void
    {
        $version = Version\Version::fromString(self::faker()->numerify('#.#.#'));

        $reference = Documentation\Reference::fromVersion($version);

        self::assertSame($version->toString(), $reference->toString());
    }

    public function testMainReturnsReference(): void
    {
        $reference = Documentation\Reference::main();

        self::assertSame('main', $reference->toString());
    }

    public function testInstalledReturnsReferenceThatIsVersionOrMain(): void
    {
        $reference = Documentation\Reference::installed();

        self::assertMatchesRegularExpression('/^(\d+\.\d+\.\d+(-[0-9A-Za-z.-]+)?|main)$/', $reference->toString());
    }
}
