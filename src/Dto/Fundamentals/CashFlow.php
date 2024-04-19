<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class CashFlow
{
    /** @param list<CashFlowCashFlow> $cashFlow */
    public function __construct(public Meta $meta, public array $cashFlow)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     meta: array{
         *         symbol: string,
         *         name: string,
         *         currency: string,
         *         exchange: string,
         *         mic_code: string,
         *         exchange_timezone: string,
         *     },
         *     cash_flow: list<array{
         *         fiscal_date: string,
         *         quarter: int|null,
         *         operating_activities: array{
         *             net_income: int,
         *             depreciation: int,
         *             deferred_taxes: int|null,
         *             stock_based_compensation: int,
         *             other_non_cash_items: int,
         *             accounts_receivable: int,
         *             accounts_payable: int,
         *             other_assets_liabilities: int,
         *             operating_cash_flow: int,
         *         },
         *         investing_activities: array{
         *             capital_expenditures: int,
         *             net_intangibles: int|null,
         *             net_acquisitions: int|null,
         *             purchase_of_investments: int,
         *             sale_of_investments: int,
         *             other_investing_activity: int,
         *             investing_cash_flow: int,
         *         },
         *         financing_activities: array{
         *             long_term_debt_issuance: int|null,
         *             long_term_debt_payments: int,
         *             short_term_debt_issuance: int,
         *             common_stock_issuance: int|null,
         *             common_stock_repurchase: int,
         *             common_dividends: int,
         *             other_financing_charges: int,
         *             financing_cash_flow: int,
         *         },
         *         end_cash_position: int,
         *         income_tax_paid: int,
         *         interest_paid: int,
         *         free_cash_flow: int,
         *    }>
         * } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     meta: array{
     *         symbol: string,
     *         name: string,
     *         currency: string,
     *         exchange: string,
     *         mic_code: string,
     *         exchange_timezone: string,
     *     },
     *     cash_flow: list<array{
     *         fiscal_date: string,
     *         quarter: int|null,
     *         operating_activities: array{
     *             net_income: int,
     *             depreciation: int,
     *             deferred_taxes: int|null,
     *             stock_based_compensation: int,
     *             other_non_cash_items: int,
     *             accounts_receivable: int,
     *             accounts_payable: int,
     *             other_assets_liabilities: int,
     *             operating_cash_flow: int,
     *         },
     *         investing_activities: array{
     *             capital_expenditures: int,
     *             net_intangibles: int|null,
     *             net_acquisitions: int|null,
     *             purchase_of_investments: int,
     *             sale_of_investments: int,
     *             other_investing_activity: int,
     *             investing_cash_flow: int,
     *         },
     *         financing_activities: array{
     *             long_term_debt_issuance: int|null,
     *             long_term_debt_payments: int,
     *             short_term_debt_issuance: int,
     *             common_stock_issuance: int|null,
     *             common_stock_repurchase: int,
     *             common_dividends: int,
     *             other_financing_charges: int,
     *             financing_cash_flow: int,
     *         },
     *         end_cash_position: int,
     *         income_tax_paid: int,
     *         interest_paid: int,
     *         free_cash_flow: int,
     *    }>
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            cashFlow: array_map(
                fn (array $item): CashFlowCashFlow => CashFlowCashFlow::fromArray($item),
                $data['cash_flow'],
            ),
        );
    }
}
