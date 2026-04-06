<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfTrailingReturnType from EtfTrailingReturn
 * @phpstan-import-type EtfAnnualTotalReturnType from EtfAnnualTotalReturn
 * @phpstan-type EtfPerformanceDataType array{
 *     trailing_returns: list<EtfTrailingReturnType>,
 *     annual_total_returns: list<EtfAnnualTotalReturnType>,
 * }
 * @phpstan-type EtfPerformanceType array{
 *     etf: array{performance: EtfPerformanceDataType},
 *     status: string,
 * }
 */
readonly class EtfPerformance
{
    /**
     * @param list<EtfTrailingReturn> $trailingReturns
     * @param list<EtfAnnualTotalReturn> $annualTotalReturns
     */
    public function __construct(public array $trailingReturns, public array $annualTotalReturns, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EtfPerformanceType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfPerformanceType $data */
    public static function fromArray(array $data): self
    {
        $performance = $data['etf']['performance'];

        return new self(
            trailingReturns: array_map(
                fn (array $item): EtfTrailingReturn => EtfTrailingReturn::fromArray($item),
                $performance['trailing_returns'],
            ),
            annualTotalReturns: array_map(
                fn (array $item): EtfAnnualTotalReturn => EtfAnnualTotalReturn::fromArray($item),
                $performance['annual_total_returns'],
            ),
            status: $data['status'],
        );
    }
}
