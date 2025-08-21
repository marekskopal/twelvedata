<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type TimeSeriesForecastType array{
 *     datetime: string,
 *     tsf: string,
 * }
 * @implements ValueInterface<TimeSeriesForecast, TimeSeriesForecastType>
 */
readonly class TimeSeriesForecast implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $tsf)
    {
    }

    /** @param TimeSeriesForecastType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            tsf: $data['tsf'],
        );
    }
}
