<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfHoldingType array{
 *     symbol: string,
 *     name: string,
 *     exchange: string,
 *     mic_code: string,
 *     weight: float,
 * }
 */
readonly class EtfHolding
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $micCode,
        public float $weight,
    ) {
    }

    /** @param EtfHoldingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            weight: $data['weight'],
        );
    }
}
