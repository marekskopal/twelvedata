<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type DividendsCalendarType array{
 *     symbol: string,
 *     mic_code: string,
 *     exchange: string,
 *     ex_date: string,
 *     amount: float,
 *  }
 */
readonly class DividendsCalendar
{
    public function __construct(
        public string $symbol,
        public string $micCode,
        public string $exchange,
        public DateTimeImmutable $exDate,
        public float $amount,
    ) {
    }

    /** @param DividendsCalendarType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            micCode: $data['mic_code'],
            exchange: $data['exchange'],
            exDate: new DateTimeImmutable($data['ex_date']),
            amount: $data['amount'],
        );
    }
}
