<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\WebSocket;

readonly class PriceEvent
{
    public function __construct(
        public string $event,
        public string $symbol,
        public string $currency,
        public string $exchange,
        public string $micCode,
        public string $type,
        public int $timestamp,
        public float $price,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     event: string,
         *     symbol: string,
         *     currency: string,
         *     exchange: string,
         *     mic_code: string,
         *     type: string,
         *     timestamp: int,
         *     price: float,
         * } $data
         */
        $data = json_decode($json, associative: true);

        return self::fromArray($data);
    }

    /**
     * @param array{
     *     event: string,
     *     symbol: string,
     *     currency: string,
     *     exchange: string,
     *     mic_code: string,
     *     type: string,
     *     timestamp: int,
     *     price: float,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            event: $data['event'],
            symbol: $data['symbol'],
            currency: $data['currency'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            type: $data['type'],
            timestamp: $data['timestamp'],
            price: $data['price'],
        );
    }
}
