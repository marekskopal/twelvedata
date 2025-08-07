<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowFinancingActivitiesType array{
 *     long_term_debt_issuance: int|null,
 *     long_term_debt_payments: int,
 *     short_term_debt_issuance: int,
 *     common_stock_issuance: int|null,
 *     common_stock_repurchase: int,
 *     common_dividends: int,
 *     other_financing_charges: int,
 *     financing_cash_flow: int,
 * }
 */
readonly class CashFlowFinancingActivities
{
    public function __construct(
        public ?int $longTermDebtIssuance,
        public int $longTermDebtPayments,
        public int $shortTermDebtIssuance,
        public ?int $commonStockIssuance,
        public int $commonStockRepurchase,
        public int $commonDividends,
        public int $otherFinancingCharges,
        public int $financingCashFlow,
    ) {
    }

    /** @param CashFlowFinancingActivitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            longTermDebtIssuance: $data['long_term_debt_issuance'],
            longTermDebtPayments: $data['long_term_debt_payments'],
            shortTermDebtIssuance: $data['short_term_debt_issuance'],
            commonStockIssuance: $data['common_stock_issuance'],
            commonStockRepurchase: $data['common_stock_repurchase'],
            commonDividends: $data['common_dividends'],
            otherFinancingCharges: $data['other_financing_charges'],
            financingCashFlow: $data['financing_cash_flow'],
        );
    }
}
