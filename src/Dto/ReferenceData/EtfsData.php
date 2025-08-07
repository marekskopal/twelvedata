<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type AccessType from Access
 * @phpstan-type EtfsDataType array{
 *     symbol: string,
 *     name: string,
 *     currency: string,
 *     exchange: string,
 *     mic_code: string,
 *     country: string,
 *     figi_code: string,
 *     cfi_code: string,
 *     isin: string,
 *     cusip: string,
 *     access?: AccessType
 * }
 */
readonly class EtfsData
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $currency,
        public string $exchange,
        public string $micCode,
        public string $country,
        public string $figiCode,
        public string $cfiCode,
        public string $isin,
        public string $cusip,
        public ?Access $access,
    ) {
    }

    /** @param EtfsDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            currency: $data['currency'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            country: $data['country'],
            figiCode: $data['figi_code'],
            cfiCode: $data['cfi_code'],
            isin: $data['isin'],
            cusip: $data['cusip'],
            access: ($data['access'] ?? null) !== null ? Access::fromArray($data['access']) : null,
        );
    }
}
