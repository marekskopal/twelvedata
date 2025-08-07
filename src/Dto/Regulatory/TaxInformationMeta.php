<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-type TaxInformationMetaType array{
 *     symbol: string,
 *     name: string,
 *     exchange: string,
 *     mic_code: string,
 *     country: string,
 * }
 */
readonly class TaxInformationMeta
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $micCode,
        public string $country,
    )
    {
    }

    /** @param TaxInformationMetaType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            country: $data['country'],
        );
    }
}
