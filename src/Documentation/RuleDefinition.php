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
     * @var list<CodeSample>
     */
    private array $codeSamples;

    /**
     * @param list<Parameter>  $parameters
     * @param list<CodeSample> $codeSamples
     */
    private function __construct(
        string $configurationKey,
        string $description,
        string $rationale,
        string $tip,
        array $parameters,
        array $codeSamples
    ) {
        $this->configurationKey = $configurationKey;
        $this->description = $description;
        $this->rationale = $rationale;
        $this->tip = $tip;
        $this->parameters = $parameters;
        $this->codeSamples = $codeSamples;
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
            [],
        );
    }

    public function withCodeSamples(CodeSample ...$codeSamples): self
    {
        return new self(
            $this->configurationKey,
            $this->description,
            $this->rationale,
            $this->tip,
            $this->parameters,
            \array_values($codeSamples),
        );
    }

    public function configurationKey(): string
    {
        return $this->configurationKey;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function rationale(): string
    {
        return $this->rationale;
    }

    public function tip(): string
    {
        return $this->tip;
    }

    /**
     * @return list<Parameter>
     */
    public function parameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return list<CodeSample>
     */
    public function codeSamples(): array
    {
        return $this->codeSamples;
    }
}
