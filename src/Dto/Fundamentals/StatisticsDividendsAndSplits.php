<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

readonly class StatisticsDividendsAndSplits
{
    public function __construct(
        public float $forwardAnnualDividendRate,
        public float $forwardAnnualDividendYield,
        public float $trailingAnnualDividendRate,
        public float $trailingAnnualDividendYield,
        public float $fiveYearAverageDividendYield,
        public float $payoutRatio,
        public DateTimeImmutable $dividendDate,
        public DateTimeImmutable $exDividendDate,
        public string $lastSplitFactor,
        public DateTimeImmutable $lastSplitDate,
    ) {
    }

    /**
     * @param array{
     *     forward_annual_dividend_rate: float,
     *     forward_annual_dividend_yield: float,
     *     trailing_annual_dividend_rate: float,
     *     trailing_annual_dividend_yield: float,
     *     "5_year_average_dividend_yield": float,
     *     payout_ratio: float,
     *     dividend_date: string,
     *     ex_dividend_date: string,
     *     last_split_factor: string,
     *     last_split_date: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            forwardAnnualDividendRate: $data['forward_annual_dividend_rate'],
            forwardAnnualDividendYield: $data['forward_annual_dividend_yield'],
            trailingAnnualDividendRate: $data['trailing_annual_dividend_rate'],
            trailingAnnualDividendYield: $data['trailing_annual_dividend_yield'],
            fiveYearAverageDividendYield: $data['5_year_average_dividend_yield'],
            payoutRatio: $data['payout_ratio'],
            dividendDate: new DateTimeImmutable($data['dividend_date']),
            exDividendDate: new DateTimeImmutable($data['ex_dividend_date']),
            lastSplitFactor: $data['last_split_factor'],
            lastSplitDate: new DateTimeImmutable($data['last_split_date']),
        );
    }
}
