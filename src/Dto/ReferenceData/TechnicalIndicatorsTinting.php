<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-type TechnicalIndicatorsTintingType array{
 *     display: string,
 *     color: string,
 *     transparency: float,
 *     lower_bound: int|string,
 *     upper_bound: int|string,
 * }
 */
readonly class TechnicalIndicatorsTinting
{
    public function __construct(
        public string $display,
        public string $color,
        public float $transparency,
        public int|string $lowerBound,
        public int|string $upperBound,
    ) {
    }

    /** @param TechnicalIndicatorsTintingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            display: $data['display'],
            color: $data['color'],
            transparency: $data['transparency'],
            lowerBound: $data['lower_bound'],
            upperBound: $data['upper_bound'],
        );
    }
}
