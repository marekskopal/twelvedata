<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

/**
 * @phpstan-type LatestPriceType array{
 *     price: string,
 * }
 */
readonly class LatestPrice
{
    public function __construct(public string $price)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var LatestPriceType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param LatestPriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(price: $data['price']);
    }
}
