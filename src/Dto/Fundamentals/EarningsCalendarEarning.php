<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type EarningsCalendarEarningType array{
 *     date: string,
 *     symbol: string,
 *     name: string,
 *     currency: string,
 *     exchange: string,
 *     mic_code: string,
 *     country: string,
 *     time: string,
 *     eps_estimate: float|null,
 *     eps_actual: float|null,
 *     difference: float|null,
 *     surprise_prc: float|null,
 * }
 */
readonly class EarningsCalendarEarning
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $symbol,
        public string $name,
        public string $currency,
        public string $exchange,
        public string $micCode,
        public string $country,
        public string $time,
        public ?float $epsEstimate,
        public ?float $epsActual,
        public ?float $difference,
        public ?float $surprisePrc,
    ) {
    }

    /** @param EarningsCalendarEarningType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            symbol: $data['symbol'],
            name: $data['name'],
            currency: $data['currency'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            country: $data['country'],
            time: $data['time'],
            epsEstimate: $data['eps_estimate'],
            epsActual: $data['eps_actual'],
            difference: $data['difference'],
            surprisePrc: $data['surprise_prc'],
        );
    }
}
