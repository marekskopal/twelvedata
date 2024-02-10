<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class IncomeStatement
{
    /** @param list<IncomeStatementIncomeStatement> $incomeStatement */
    public function __construct(public Meta $meta, public array $incomeStatement)
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
         *     income_statement: list<array{
         *         fiscal_date: string,
         *         quarter?: int,
         *         sales: int,
         *         cost_of_goods: int,
         *         gross_profit: int,
         *         operating_expense: array{
         *             research_and_development: int,
         *             selling_general_and_administrative: int,
         *             other_operating_expenses: int|null,
         *         },
         *         operating_income: int,
         *         non_operating_interest: array{
         *             income: int,
         *             expense: int,
         *         },
         *         other_income_expense: int,
         *         pretax_income: int,
         *         income_tax: int,
         *         net_income: int,
         *         eps_basic: float,
         *         eps_diluted: float,
         *         basic_shares_outstanding: int,
         *         diluted_shares_outstanding: int,
         *         ebitda: int,
         *         net_income_continuous_operations: int|null,
         *         minority_interests: int|null,
         *         preferred_stock_dividends: int|null,
         *     }>
         *  } $responseContents
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
     *     income_statement: list<array{
     *         fiscal_date: string,
     *         quarter?: int,
     *         sales: int,
     *         cost_of_goods: int,
     *         gross_profit: int,
     *         operating_expense: array{
     *             research_and_development: int,
     *             selling_general_and_administrative: int,
     *             other_operating_expenses: int|null,
     *         },
     *         operating_income: int,
     *         non_operating_interest: array{
     *             income: int,
     *             expense: int,
     *         },
     *         other_income_expense: int,
     *         pretax_income: int,
     *         income_tax: int,
     *         net_income: int,
     *         eps_basic: float,
     *         eps_diluted: float,
     *         basic_shares_outstanding: int,
     *         diluted_shares_outstanding: int,
     *         ebitda: int,
     *         net_income_continuous_operations: int|null,
     *         minority_interests: int|null,
     *         preferred_stock_dividends: int|null,
     *     }>
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            incomeStatement: array_map(
                fn (array $item): IncomeStatementIncomeStatement => IncomeStatementIncomeStatement::fromArray($item),
                $data['income_statement'],
            ),
        );
    }
}
