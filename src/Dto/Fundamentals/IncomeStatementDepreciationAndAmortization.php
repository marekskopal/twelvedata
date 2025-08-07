<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementDepreciationAndAmortizationType array{
 *     depreciation_amortization_depletion: int,
 *     amortization_of_intangibles: int,
 *     depreciation: int,
 *     amortization: int,
 *     depletion: int,
 *     depreciation_and_amortization_in_income_statement: int,
 * }
 */
readonly class IncomeStatementDepreciationAndAmortization
{
    public function __construct(
        public int $depreciationAmortizationDepletion,
        public int $amortizationOfIntangibles,
        public int $depreciation,
        public int $amortization,
        public int $depletion,
        public int $depreciationAndAmortizationInIncomeStatement,
    ) {
    }

    /** @param IncomeStatementDepreciationAndAmortizationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            depreciationAmortizationDepletion: $data['depreciation_amortization_depletion'],
            amortizationOfIntangibles: $data['amortization_of_intangibles'],
            depreciation: $data['depreciation'],
            amortization: $data['amortization'],
            depletion: $data['depletion'],
            depreciationAndAmortizationInIncomeStatement: $data['depreciation_and_amortization_in_income_statement'],
        );
    }
}
