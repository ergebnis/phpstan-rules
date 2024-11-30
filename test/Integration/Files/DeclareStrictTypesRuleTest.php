<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Files;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use Ergebnis\PHPStan\Rules\Files;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Node;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Files\DeclareStrictTypesRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class DeclareStrictTypesRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'file-empty' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-empty.php',
            'file-with-comment-and-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on.php',
            'file-with-comment-and-declare-strict-types-on-and-invalid-casing' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on-and-invalid-casing.php',
            'file-with-comment-and-declare-strict-types-on-and-multiple-declares' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on-and-multiple-declares.php',
            'file-with-comment-and-declare-strict-types-on-and-namespace-declaration' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on-and-namespace-declaration.php',
            'file-with-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on.php',
            'file-with-declare-strict-types-on-and-invalid-casing' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on-and-invalid-casing.php',
            'file-with-declare-strict-types-on-and-multiple-declares' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on-and-multiple-declares.php',
            'file-with-declare-strict-types-on-and-namespace-declaration' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on-and-namespace-declaration.php',
            'file-with-doc-block-and-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on.php',
            'file-with-doc-block-and-declare-strict-types-on-and-invalid-casing' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on-and-invalid-casing.php',
            'file-with-doc-block-and-declare-strict-types-on-and-multiple-declares' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on-and-multiple-declares.php',
            'file-with-doc-block-and-declare-strict-types-on-and-namespace-declaration' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on-and-namespace-declaration.php',
            'file-with-shebang-and-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-shebang-and-declare-strict-types-on.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public static function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'file-with-comment-and-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-comment-and-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
            ],
            'file-with-comment-and-declare-strict-types-off-and-invalid-casing' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-comment-and-declare-strict-types-off-and-invalid-casing.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
            ],
            'file-with-comment-and-declare-strict-types-off-and-multiple-declares' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-comment-and-declare-strict-types-off-and-multiple-declares.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
            ],
            'file-with-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-declare-strict-types-off-and-invalid-casing' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-strict-types-off-and-invalid-casing.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-declare-strict-types-off-and-multiple-declares' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-strict-types-off-and-multiple-declares.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-declare-ticks' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-ticks.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-doc-block-and-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-doc-block-and-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
            ],
            'file-with-doc-block-and-declare-strict-types-off-and-invalid-casing' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-doc-block-and-declare-strict-types-off-and-invalid-casing.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
            ],
            'file-with-doc-block-and-declare-strict-types-off-and-multiple-declares' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-doc-block-and-declare-strict-types-off-and-multiple-declares.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
            ],
            'file-with-shebang-and-another-one-text-line-before-opening-tag' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-shebang-and-another-one-text-line-before-opening-tag.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                ],
            ],
            'file-with-shebang-and-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-shebang-and-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                ],
            ],
            'file-with-text-before-opening-tag' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-text-before-opening-tag.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                ],
            ],
            'file-without-declare-strict-types-and-namespace-declaration' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-without-declare-strict-types-and-namespace-declaration.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-without-declare-strict-types' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-without-declare-strict-types.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    /**
     * @return Rules\Rule<Node\FileNode>
     */
    protected function getRule(): Rules\Rule
    {
        return new Files\DeclareStrictTypesRule();
    }
}
