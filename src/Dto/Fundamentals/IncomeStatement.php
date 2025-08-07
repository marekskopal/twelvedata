<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type IncomeStatementIncomeStatementType from IncomeStatementIncomeStatement
 * @phpstan-type IncomeStatementType array{
 *     meta: MetaType,
 *     income_statement: list<IncomeStatementIncomeStatementType>,
 * }
 */
readonly class IncomeStatement
{
    /** @param list<IncomeStatementIncomeStatement> $incomeStatement */
    public function __construct(public Meta $meta, public array $incomeStatement)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var IncomeStatementType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param IncomeStatementType $data */
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
