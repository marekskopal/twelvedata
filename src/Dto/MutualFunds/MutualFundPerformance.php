<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundTrailingReturnType from MutualFundTrailingReturn
 * @phpstan-import-type MutualFundAnnualTotalReturnType from MutualFundAnnualTotalReturn
 * @phpstan-import-type MutualFundQuarterlyTotalReturnType from MutualFundQuarterlyTotalReturn
 * @phpstan-import-type MutualFundLoadAdjustedReturnType from MutualFundLoadAdjustedReturn
 * @phpstan-type MutualFundPerformanceDataType array{
 *     trailing_returns: list<MutualFundTrailingReturnType>,
 *     annual_total_returns: list<MutualFundAnnualTotalReturnType>,
 *     quarterly_total_returns: list<MutualFundQuarterlyTotalReturnType>,
 *     load_adjusted_return: list<MutualFundLoadAdjustedReturnType>,
 * }
 * @phpstan-type MutualFundPerformanceType array{
 *     mutual_fund: array{performance: MutualFundPerformanceDataType},
 *     status: string,
 * }
 */
readonly class MutualFundPerformance
{
    /**
     * @param list<MutualFundTrailingReturn> $trailingReturns
     * @param list<MutualFundAnnualTotalReturn> $annualTotalReturns
     * @param list<MutualFundQuarterlyTotalReturn> $quarterlyTotalReturns
     * @param list<MutualFundLoadAdjustedReturn> $loadAdjustedReturn
     */
    public function __construct(
        public array $trailingReturns,
        public array $annualTotalReturns,
        public array $quarterlyTotalReturns,
        public array $loadAdjustedReturn,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundPerformanceType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundPerformanceType $data */
    public static function fromArray(array $data): self
    {
        $performance = $data['mutual_fund']['performance'];

        return new self(
            trailingReturns: array_map(
                fn (array $item): MutualFundTrailingReturn => MutualFundTrailingReturn::fromArray($item),
                $performance['trailing_returns'],
            ),
            annualTotalReturns: array_map(
                fn (array $item): MutualFundAnnualTotalReturn => MutualFundAnnualTotalReturn::fromArray($item),
                $performance['annual_total_returns'],
            ),
            quarterlyTotalReturns: array_map(
                fn (array $item): MutualFundQuarterlyTotalReturn => MutualFundQuarterlyTotalReturn::fromArray($item),
                $performance['quarterly_total_returns'],
            ),
            loadAdjustedReturn: array_map(
                fn (array $item): MutualFundLoadAdjustedReturn => MutualFundLoadAdjustedReturn::fromArray($item),
                $performance['load_adjusted_return'],
            ),
            status: $data['status'],
        );
    }
}
