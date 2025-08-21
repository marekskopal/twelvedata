<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-type TechnicalIndicatorsOutputValueType array{
 *     default_color?: string,
 *     display: string,
 *     min_range?: int,
 *     max_range?: int,
 * }
 */
readonly class TechnicalIndicatorsOutputValue
{
    public function __construct(public ?string $defaultColor, public string $display, public ?int $minRange, public ?int $maxRange,)
    {
    }

    /** @param TechnicalIndicatorsOutputValueType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            defaultColor: $data['default_color'] ?? null,
            display: $data['display'],
            minRange: $data['min_range'] ?? null,
            maxRange: $data['max_range'] ?? null,
        );
    }
}
