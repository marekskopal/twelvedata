<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

use DateTimeImmutable;

readonly class DividendsDividend
{
    public function __construct(public DateTimeImmutable $exDate, public float $amount,)
    {
    }

    /**
     * @param array{
     *     ex_date: string,
     *     amount: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            exDate: new DateTimeImmutable($data['ex_date']),
            amount: $data['amount'],
        );
    }
}
