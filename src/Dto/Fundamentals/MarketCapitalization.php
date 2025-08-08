<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type MarketCapitalizationMarketCapType from MarketCapitalizationMarketCap
 * @phpstan-type MarketCapitalizationType array{
 *     meta: MetaType,
 *     market_cap: list<MarketCapitalizationMarketCapType>,
 * }
 */
readonly class MarketCapitalization
{
    /** @param list<MarketCapitalizationMarketCap> $marketCap */
    public function __construct(public Meta $meta, public array $marketCap)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var MarketCapitalizationType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MarketCapitalizationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            marketCap: array_map(
                static fn(array $item): MarketCapitalizationMarketCap => MarketCapitalizationMarketCap::fromArray($item),
                $data['market_cap'],
            ),
        );
    }
}
