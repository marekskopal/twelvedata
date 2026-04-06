<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfAssetAllocationType array{
 *     cash: float,
 *     stocks: float,
 *     preferred_stocks: float,
 *     convertables: float,
 *     bonds: float,
 *     others: float,
 * }
 */
readonly class EtfAssetAllocation
{
    public function __construct(
        public float $cash,
        public float $stocks,
        public float $preferredStocks,
        public float $convertables,
        public float $bonds,
        public float $others,
    ) {
    }

    /** @param EtfAssetAllocationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cash: $data['cash'],
            stocks: $data['stocks'],
            preferredStocks: $data['preferred_stocks'],
            convertables: $data['convertables'],
            bonds: $data['bonds'],
            others: $data['others'],
        );
    }
}
