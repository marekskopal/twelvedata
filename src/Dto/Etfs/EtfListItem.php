<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfListItemType array{
 *     symbol: string,
 *     name: string,
 *     country: string,
 *     mic_code: string,
 *     fund_family: string,
 *     fund_type: string,
 * }
 */
readonly class EtfListItem
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $country,
        public string $micCode,
        public string $fundFamily,
        public string $fundType,
    ) {
    }

    /** @param EtfListItemType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            country: $data['country'],
            micCode: $data['mic_code'],
            fundFamily: $data['fund_family'],
            fundType: $data['fund_type'],
        );
    }
}
