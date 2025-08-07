<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-type TaxInformationDataType array{
 *     tax_indicator: string,
 * }
 */
readonly class TaxInformationData
{
    public function __construct(public string $taxIndicator)
    {
    }

    /** @param TaxInformationDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(taxIndicator: $data['tax_indicator']);
    }
}
