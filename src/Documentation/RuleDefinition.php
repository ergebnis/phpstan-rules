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
final class RuleDefinition
{
    private string $configurationKey;
    private string $description;
    private string $rationale;
    private string $tip;

    /**
     * @var list<Parameter>
     */
    private array $parameters;

    /**
     * @param list<Parameter> $parameters
     */
    private function __construct(
        string $configurationKey,
        string $description,
        string $rationale,
        string $tip,
        array $parameters
    ) {
        $this->configurationKey = $configurationKey;
        $this->description = $description;
        $this->rationale = $rationale;
        $this->tip = $tip;
        $this->parameters = $parameters;
    }

    public static function create(
        string $configurationKey,
        string $description,
        string $rationale,
        string $tip,
        Parameter ...$parameters
    ): self {
        return new self(
            $configurationKey,
            $description,
            $rationale,
            $tip,
            \array_values($parameters),
        );
    }

    /**
     * Returns the key below parameters.ergebnis that holds the configuration of the rule.
     */
    public function configurationKey(): string
    {
        return $this->configurationKey;
    }

    /**
     * Returns a description of the rule, in Markdown.
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Returns the reason for the rule, in Markdown.
     */
    public function rationale(): string
    {
        return $this->rationale;
    }

    /**
     * Returns a short instruction for fixing errors reported by the rule, in Markdown that uses only backticks, so that it can also be shown as a tip for these errors.
     */
    public function tip(): string
    {
        return $this->tip;
    }

    /**
     * Returns the parameters for configuring the rule, other than the enabled parameter that every rule has.
     *
     * @return list<Parameter>
     */
    public function parameters(): array
    {
        return $this->parameters;
    }
}
