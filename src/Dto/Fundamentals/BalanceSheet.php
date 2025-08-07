<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type BalanceSheetBalanceSheetType from BalanceSheetBalanceSheet
 * @phpstan-type BalanceSheetType array{
 *     meta: MetaType,
 *     balance_sheet: list<BalanceSheetBalanceSheetType>,
 * }
 */
readonly class BalanceSheet
{
    /** @param list<BalanceSheetBalanceSheet> $balanceSheet */
    public function __construct(public Meta $meta, public array $balanceSheet)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var BalanceSheetType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param BalanceSheetType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            balanceSheet: array_map(
                fn (array $item): BalanceSheetBalanceSheet => BalanceSheetBalanceSheet::fromArray($item),
                $data['balance_sheet'],
            ),
        );
    }
}
