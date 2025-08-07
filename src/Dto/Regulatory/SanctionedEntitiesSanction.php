<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-import-type SanctionedEntitiesSanctionSanctionType from SanctionedEntitiesSanctionSanction
 * @phpstan-type SanctionedEntitiesSanctionType array{
 *     symbol: string,
 *     name: string,
 *     mic_code: string,
 *     country: string,
 *     sanction: SanctionedEntitiesSanctionSanctionType,
 * }
 */
readonly class SanctionedEntitiesSanction
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $micCode,
        public string $country,
        public SanctionedEntitiesSanctionSanction $sanction,
    ) {
    }

    /** @param SanctionedEntitiesSanctionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            micCode: $data['mic_code'],
            country: $data['country'],
            sanction: SanctionedEntitiesSanctionSanction::fromArray($data['sanction']),
        );
    }
}
