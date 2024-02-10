<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class StatisticsCashFlow
{
    public function __construct(public int $operatingCashFlowTtm, public int $leveredFreeCashFlowTtm,)
    {
    }

    /**
     * @param array{
     *     operating_cash_flow_ttm: int,
     *     levered_free_cash_flow_ttm: int,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            operatingCashFlowTtm: $data['operating_cash_flow_ttm'],
            leveredFreeCashFlowTtm: $data['levered_free_cash_flow_ttm'],
        );
    }
}
