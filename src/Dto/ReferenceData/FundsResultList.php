<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type AccessType from Access
 * @phpstan-type FundsResultListType array{
 *     symbol: string,
 *     name: string,
 *     country: string,
 *     currency: string,
 *     exchange: string,
 *     type: string,
 *     figi_code: string,
 *     cfi_code: string,
 *     isin: string,
 *     cusip: string,
 *     access?: AccessType
 * }
 */
readonly class FundsResultList
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $country,
        public string $currency,
        public string $exchange,
        public string $type,
        public string $figiCode,
        public string $cfiCode,
        public string $isin,
        public string $cusip,
        public ?Access $access,
    ) {
    }

    /** @param FundsResultListType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            country: $data['country'],
            currency: $data['currency'],
            exchange: $data['exchange'],
            type: $data['type'],
            figiCode: $data['figi_code'],
            cfiCode: $data['cfi_code'],
            isin: $data['isin'],
            cusip: $data['cusip'],
            access: isset($data['access']) ? Access::fromArray($data['access']) : null,
        );
    }
}
