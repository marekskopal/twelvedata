<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

readonly class RealTimePrice
{
    public function __construct(public string $price)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     price: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     price: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(price: $data['price']);
    }
}
