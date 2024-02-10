<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class IncomeStatementNonOperatingInterest
{
    public function __construct(public int $income, public int $expense,)
    {
    }

    /**
     * @param array{
     *     income: int,
     *     expense: int,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(income: $data['income'], expense: $data['expense']);
    }
}
