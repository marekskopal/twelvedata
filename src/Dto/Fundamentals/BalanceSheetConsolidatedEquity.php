<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedCapitalStockType from BalanceSheetConsolidatedCapitalStock
 * @phpstan-import-type BalanceSheetConsolidatedEquityAdjustmentsType from BalanceSheetConsolidatedEquityAdjustments
 * @phpstan-type BalanceSheetConsolidatedEquityType array{
 *     total_equity_gross_minority_interest: int,
 *     stockholders_equity: int,
 *     common_stock_equity: int,
 *     preferred_stock_equity?: int,
 *     other_equity_interest?: int,
 *     minority_interest?: int,
 *     total_capitalization: int,
 *     net_tangible_assets: int,
 *     tangible_book_value: int,
 *     invested_capital: int,
 *     working_capital: int,
 *     capital_stock: BalanceSheetConsolidatedCapitalStockType,
 *     equity_adjustments: BalanceSheetConsolidatedEquityAdjustmentsType,
 *     net_debt: int,
 *     total_debt: int,
 * }
 */
readonly class BalanceSheetConsolidatedEquity
{
    public function __construct(
        public int $totalEquityGrossMinorityInterest,
        public int $stockholdersEquity,
        public int $commonStockEquity,
        public ?int $preferredStockEquity,
        public ?int $otherEquityInterest,
        public ?int $minorityInterest,
        public int $totalCapitalization,
        public int $netTangibleAssets,
        public int $tangibleBookValue,
        public int $investedCapital,
        public int $workingCapital,
        public BalanceSheetConsolidatedCapitalStock $capitalStock,
        public BalanceSheetConsolidatedEquityAdjustments $equityAdjustments,
        public int $netDebt,
        public int $totalDebt,
    ) {
    }

    /** @param BalanceSheetConsolidatedEquityType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalEquityGrossMinorityInterest: $data['total_equity_gross_minority_interest'],
            stockholdersEquity: $data['stockholders_equity'],
            commonStockEquity: $data['common_stock_equity'],
            preferredStockEquity: $data['preferred_stock_equity'] ?? null,
            otherEquityInterest: $data['other_equity_interest'] ?? null,
            minorityInterest: $data['minority_interest'] ?? null,
            totalCapitalization: $data['total_capitalization'],
            netTangibleAssets: $data['net_tangible_assets'],
            tangibleBookValue: $data['tangible_book_value'],
            investedCapital: $data['invested_capital'],
            workingCapital: $data['working_capital'],
            capitalStock: BalanceSheetConsolidatedCapitalStock::fromArray($data['capital_stock']),
            equityAdjustments: BalanceSheetConsolidatedEquityAdjustments::fromArray($data['equity_adjustments']),
            netDebt: $data['net_debt'],
            totalDebt: $data['total_debt'],
        );
    }
}
