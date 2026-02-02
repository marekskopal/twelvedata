<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-type TechnicalIndicatorsParameterType array{
 *     default: int|float|string|bool,
 *     max_range?: int|float,
 *     min_range?: int|float,
 *     range?: list<string>,
 *     type?: string
 * }
 */
readonly class TechnicalIndicatorsParameter
{
    /** @param list<string>|null $range */
    public function __construct(
        public int|float|string|bool $default,
        public int|float|null $maxRange,
        public int|float|null $minRange,
        public ?array $range,
        public ?string $type,
    ) {
    }

    /** @param TechnicalIndicatorsParameterType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            default: $data['default'],
            maxRange: $data['max_range'] ?? null,
            minRange: $data['min_range'] ?? null,
            range: $data['range'] ?? null,
            type: $data['type'] ?? null,
        );
    }
}
