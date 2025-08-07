<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedBalanceSheetType from BalanceSheetConsolidatedBalanceSheet
 * @phpstan-type BalanceSheetConsolidatedType array{
 *     balance_sheet: list<BalanceSheetConsolidatedBalanceSheetType>,
 *     status: string,
 * }
 */
readonly class BalanceSheetConsolidated
{
    /** @param list<BalanceSheetConsolidatedBalanceSheet> $balanceSheet */
    public function __construct(public array $balanceSheet, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var BalanceSheetConsolidatedType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param BalanceSheetConsolidatedType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            balanceSheet: array_map(
                static fn(array $item): BalanceSheetConsolidatedBalanceSheet => BalanceSheetConsolidatedBalanceSheet::fromArray($item),
                $data['balance_sheet'],
            ),
            status: $data['status'],
        );
    }
}
