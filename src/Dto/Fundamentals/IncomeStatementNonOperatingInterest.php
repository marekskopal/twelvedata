<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementNonOperatingInterestType array{
 *     income: int|null,
 *     expense: int|null,
 * }
 */
readonly class IncomeStatementNonOperatingInterest
{
    public function __construct(public ?int $income, public ?int $expense,)
    {
    }

    /** @param IncomeStatementNonOperatingInterestType $data */
    public static function fromArray(array $data): self
    {
        return new self(income: $data['income'], expense: $data['expense']);
    }
}
