<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundPersonType from MutualFundPerson
 * @phpstan-type MutualFundSummaryDataType array{
 *     symbol: string,
 *     name: string,
 *     fund_family: string,
 *     fund_type: string,
 *     currency: string,
 *     share_class_inception_date: string,
 *     ytd_return: float|null,
 *     expense_ratio_net: float|null,
 *     yield: float|null,
 *     nav: float|null,
 *     min_investment: float|null,
 *     turnover_rate: float|null,
 *     net_assets: float|null,
 *     overview: string|null,
 *     people: list<MutualFundPersonType>,
 * }
 */
readonly class MutualFundSummaryData
{
    /** @param list<MutualFundPerson> $people */
    public function __construct(
        public string $symbol,
        public string $name,
        public string $fundFamily,
        public string $fundType,
        public string $currency,
        public string $shareClassInceptionDate,
        public ?float $ytdReturn,
        public ?float $expenseRatioNet,
        public ?float $yield,
        public ?float $nav,
        public ?float $minInvestment,
        public ?float $turnoverRate,
        public ?float $netAssets,
        public ?string $overview,
        public array $people,
    ) {
    }

    /** @param MutualFundSummaryDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            fundFamily: $data['fund_family'],
            fundType: $data['fund_type'],
            currency: $data['currency'],
            shareClassInceptionDate: $data['share_class_inception_date'],
            ytdReturn: $data['ytd_return'] ?? null,
            expenseRatioNet: $data['expense_ratio_net'] ?? null,
            yield: $data['yield'] ?? null,
            nav: $data['nav'] ?? null,
            minInvestment: $data['min_investment'] ?? null,
            turnoverRate: $data['turnover_rate'] ?? null,
            netAssets: $data['net_assets'] ?? null,
            overview: $data['overview'] ?? null,
            people: array_map(
                fn (array $item): MutualFundPerson => MutualFundPerson::fromArray($item),
                $data['people'],
            ),
        );
    }
}
