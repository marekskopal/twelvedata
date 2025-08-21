<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type CommodityChannelIndexType array{
 *     datetime: string,
 *     cci: string,
 * }
 * @implements ValueInterface<CommodityChannelIndex, CommodityChannelIndexType>
 */
readonly class CommodityChannelIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $cci)
    {
    }

    /** @param CommodityChannelIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            cci: $data['cci'],
        );
    }
}
