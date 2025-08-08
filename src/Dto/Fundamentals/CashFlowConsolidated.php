<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type CashFlowConsolidatedCashFlowType from CashFlowConsolidatedCashFlow
 * @phpstan-type CashFlowConsolidatedType array{
 *     cash_flow: list<CashFlowConsolidatedCashFlowType>,
 *     status: string,
 * }
 */
readonly class CashFlowConsolidated
{
    /** @param list<CashFlowConsolidatedCashFlow> $cashFlow */
    public function __construct(public array $cashFlow, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var CashFlowConsolidatedType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param CashFlowConsolidatedType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cashFlow: array_map(
                static fn(array $item): CashFlowConsolidatedCashFlow => CashFlowConsolidatedCashFlow::fromArray($item),
                $data['cash_flow'],
            ),
            status: $data['status'],
        );
    }
}
