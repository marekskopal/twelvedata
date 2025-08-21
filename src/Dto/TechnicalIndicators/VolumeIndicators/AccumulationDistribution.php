<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AccumulationDistributionType array{
 *     datetime: string,
 *     ad: string,
 * }
 * @implements ValueInterface<AccumulationDistribution, AccumulationDistributionType>
 */
readonly class AccumulationDistribution implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ad)
    {
    }

    /** @param AccumulationDistributionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            ad: $data['ad'],
        );
    }
}
