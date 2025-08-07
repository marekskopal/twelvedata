<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type CashFlowCashFlowType from CashFlowCashFlow
 * @phpstan-type CashFlowType array{
 *     meta: MetaType,
 *     cash_flow: list<CashFlowCashFlowType>,
 * }
 */
readonly class CashFlow
{
    /** @param list<CashFlowCashFlow> $cashFlow */
    public function __construct(public Meta $meta, public array $cashFlow)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var CashFlowType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param CashFlowType $data */
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
