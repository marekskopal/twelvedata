<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type PriceTargetPriceTargetType from PriceTargetPriceTarget
 * @phpstan-type PriceTargetType array{
 *     meta: MetaType,
 *     price_target: PriceTargetPriceTargetType,
 * }
 */
readonly class PriceTarget
{
    public function __construct(public Meta $meta, public PriceTargetPriceTarget $priceTarget)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var PriceTargetType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param PriceTargetType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            priceTarget: PriceTargetPriceTarget::fromArray($data['price_target']),
        );
    }
}
