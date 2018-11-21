<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\AutoReview;

use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 */
final class TestCodeTest extends Framework\TestCase
{
    use Helper;

    public function testTestClassesAreAbstractOrFinal(): void
    {
        $this->assertClassesAreAbstractOrFinal(__DIR__ . '/..', [
            Fixture\Classes\AbstractOrFinalRule\NeitherAbstractNorFinalClass::class,
            Fixture\Classes\AbstractOrFinalRule\NeitherAbstractNorFinalClassButWhitelisted::class,
            Fixture\Classes\FinalRule\NeitherAbstractNorFinalClass::class,
            Fixture\Classes\FinalRule\NeitherAbstractNorFinalClassButWhitelisted::class,
        ]);
    }

    public function testIntegrationTestClassesExtendFromAbstractTestCase(): void
    {
        $this->assertClassyConstructsSatisfySpecification(
            static function (string $className): bool {
                $reflection = new \ReflectionClass($className);

                if ($reflection->isAbstract() || $reflection->isInterface() || $reflection->isTrait()) {
                    return true;
                }

                return $reflection->isSubclassOf(Integration\AbstractTestCase::class);
            },
            __DIR__ . '/../Integration',
            [],
            \sprintf(
                "Failed asserting that the integration test classes\n\n%s\n\nextend from \"%s\".",
                '%s', // 😉
                Integration\AbstractTestCase::class
            )
        );
    }
}
