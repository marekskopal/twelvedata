<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

readonly class StatisticsDividendsAndSplits
{
    public function __construct(
        public ?float $forwardAnnualDividendRate,
        public ?float $forwardAnnualDividendYield,
        public ?float $trailingAnnualDividendRate,
        public ?float $trailingAnnualDividendYield,
        public ?float $fiveYearAverageDividendYield,
        public ?float $payoutRatio,
        public ?DateTimeImmutable $dividendDate,
        public ?DateTimeImmutable $exDividendDate,
        public ?string $lastSplitFactor,
        public ?DateTimeImmutable $lastSplitDate,
    ) {
    }

    /**
     * @param array{
     *     forward_annual_dividend_rate: float|null,
     *     forward_annual_dividend_yield: float|null,
     *     trailing_annual_dividend_rate: float|null,
     *     trailing_annual_dividend_yield: float|null,
     *     "5_year_average_dividend_yield": float|null,
     *     payout_ratio: float|null,
     *     dividend_date: string|null,
     *     ex_dividend_date: string|null,
     *     last_split_factor: string|null,
     *     last_split_date: string|null,
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
            dividendDate: $data['dividend_date'] !== null ? new DateTimeImmutable($data['dividend_date']) : null,
            exDividendDate: $data['ex_dividend_date'] !== null ? new DateTimeImmutable($data['ex_dividend_date']) : null,
            lastSplitFactor: $data['last_split_factor'],
            lastSplitDate: $data['last_split_date'] !== null ? new DateTimeImmutable($data['last_split_date']) : null,
        );
    }
}
