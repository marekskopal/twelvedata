<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type SplitsCalendarType array{
 *     date: string,
 *     symbol: string,
 *     mic_code: string,
 *     exchange: string,
 *     description: string,
 *     ratio: float,
 *     from_factor: float,
 *     to_factor: float,
 *  }
 */
readonly class SplitsCalendar
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $symbol,
        public string $micCode,
        public string $exchange,
        public string $description,
        public float $ratio,
        public float $fromFactor,
        public float $toFactor,
    ) {
    }

    /** @param SplitsCalendarType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            symbol: $data['symbol'],
            micCode: $data['mic_code'],
            exchange: $data['exchange'],
            description: $data['description'],
            ratio: $data['ratio'],
            fromFactor: $data['from_factor'],
            toFactor: $data['to_factor'],
        );
    }
}
