<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type IncomeStatementConsolidatedIncomeStatementType from IncomeStatementConsolidatedIncomeStatement
 * @phpstan-type IncomeStatementConsolidatedType array{
 *     income_statement: list<IncomeStatementConsolidatedIncomeStatementType>,
 *     status: string,
 * }
 */
readonly class IncomeStatementConsolidated
{
    /** @param list<IncomeStatementConsolidatedIncomeStatement> $incomeStatement */
    public function __construct(public array $incomeStatement, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var IncomeStatementConsolidatedType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param IncomeStatementConsolidatedType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            incomeStatement: array_map(
                fn (array $item) => IncomeStatementConsolidatedIncomeStatement::fromArray($item),
                $data['income_statement'],
            ),
            status: $data['status'],
        );
    }
}
