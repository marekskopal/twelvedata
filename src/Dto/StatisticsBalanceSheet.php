<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class StatisticsBalanceSheet
{
    public function __construct(
        public int $totalCashMrq,
        public float $totalCashPerShareMrq,
        public int $totalDebtMrq,
        public float $totalDebtToEquityMrq,
        public float $currentRatioMrq,
        public float $bookValuePerShareMrq,
    ) {
    }

    /**
     * @param array{
     *     total_cash_mrq: int,
     *     total_cash_per_share_mrq: float,
     *     total_debt_mrq: int,
     *     total_debt_to_equity_mrq: float,
     *     current_ratio_mrq: float,
     *     book_value_per_share_mrq: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            totalCashMrq: $data['total_cash_mrq'],
            totalCashPerShareMrq: $data['total_cash_per_share_mrq'],
            totalDebtMrq: $data['total_debt_mrq'],
            totalDebtToEquityMrq: $data['total_debt_to_equity_mrq'],
            currentRatioMrq: $data['current_ratio_mrq'],
            bookValuePerShareMrq: $data['book_value_per_share_mrq'],
        );
    }
}
