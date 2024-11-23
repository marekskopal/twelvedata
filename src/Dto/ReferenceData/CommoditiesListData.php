<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CommoditiesListData
{
    public function __construct(public string $symbol, public string $name, public string $category, public string $description,)
    {
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     category: string,
     *     description: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], name: $data['name'], category: $data['category'], description: $data['description']);
    }
}
