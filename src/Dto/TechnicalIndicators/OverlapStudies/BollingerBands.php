<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type BollingerBandsType array{
 *     datetime: string,
 *     upper_band: string,
 *     middle_band: string,
 *     lower_band: string,
 * }
 * @implements ValueInterface<BollingerBands, BollingerBandsType>
 */
readonly class BollingerBands implements ValueInterface
{
    public function __construct(public string $datetime, public string $upperBand, public string $middleBand, public string $lowerBand,)
    {
    }

    /**
     * @param BollingerBandsType $data
     * @return BollingerBands
     */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: $data['datetime'],
            upperBand: $data['upper_band'],
            middleBand: $data['middle_band'],
            lowerBand: $data['lower_band'],
        );
    }
}
