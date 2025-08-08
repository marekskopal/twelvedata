<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowConsolidatedSupplementalDataType array{
 *     interest_paid_supplemental_data?: int,
 *     income_tax_paid_supplemental_data?: int,
 * }
 */
readonly class CashFlowConsolidatedSupplementalData
{
    public function __construct(public ?int $interestPaidSupplementalData, public ?int $incomeTaxPaidSupplementalData,)
    {
    }

    /** @param CashFlowConsolidatedSupplementalDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            interestPaidSupplementalData: $data['interest_paid_supplemental_data'] ?? null,
            incomeTaxPaidSupplementalData: $data['income_tax_paid_supplemental_data'] ?? null,
        );
    }
}
