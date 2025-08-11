<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type VolumeWeightedAveragePriceType array{
 *     datetime: string,
 *     vwap_lower?: float,
 *     vwap: string,
 *     vwap_upper?: float,
 * }
 * @implements ValueInterface<VolumeWeightedAveragePrice, VolumeWeightedAveragePriceType>
 */
readonly class VolumeWeightedAveragePrice implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public ?float $vwapLower, public string $vwap, public ?float $vwapUpper)
    {
    }

    /** @param VolumeWeightedAveragePriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            vwapLower: $data['vwap_lower'] ?? null,
            vwap: $data['vwap'],
            vwapUpper: $data['vwap_upper'] ?? null,
        );
    }
}
