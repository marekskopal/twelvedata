<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class IncomeStatementOperationExpense
{
    public function __construct(
        public int $researchAndDevelopment,
        public int $sellingGeneralAndAdministrative,
        public ?int $otherOperatingExpenses,
    ) {
    }

    /**
     * @param array{
     *     research_and_development: int,
     *     selling_general_and_administrative: int,
     *     other_operating_expenses: int|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            researchAndDevelopment: $data['research_and_development'],
            sellingGeneralAndAdministrative: $data['selling_general_and_administrative'],
            otherOperatingExpenses: $data['other_operating_expenses'],
        );
    }
}
