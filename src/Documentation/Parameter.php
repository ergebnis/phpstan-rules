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

namespace Ergebnis\PHPStan\Rules\Documentation;

/**
 * @internal
 */
final class Parameter
{
    private string $name;
    private Description $description;

    /**
     * @var bool|list<array<string, string>>|list<string>
     */
    private $example;

    /**
     * @param bool|list<array<string, string>>|list<string> $example
     */
    private function __construct(
        string $name,
        Description $description,
        $example
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->example = $example;
    }

    /**
     * @param bool|list<array<string, string>>|list<string> $example
     */
    public static function create(
        string $name,
        Description $description,
        $example
    ): self {
        return new self(
            $name,
            $description,
            $example,
        );
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): Description
    {
        return $this->description;
    }

    /**
     * @return bool|list<array<string, string>>|list<string>
     */
    public function example()
    {
        return $this->example;
    }
}
