<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

use DateTimeImmutable;

readonly class EndOfDayPrice
{
    public function __construct(
        public string $symbol,
        public string $exchange,
        public string $micCode,
        public string $currency,
        public DateTimeImmutable $datetime,
        public string $close,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     symbol: string,
         *     exchange: string,
         *     mic_code: string,
         *     currency: string,
         *     datetime: string,
         *     close: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     symbol: string,
     *     exchange: string,
     *     mic_code: string,
     *     currency: string,
     *     datetime: string,
     *     close: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            currency: $data['currency'],
            datetime: new DateTimeImmutable($data['datetime']),
            close: $data['close'],
        );
    }
}
