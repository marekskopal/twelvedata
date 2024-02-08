<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class MarketState
{
    public function __construct(
        public string $name,
        public string $code,
        public string $country,
        public bool $isMarketOpen,
        public string $timeAfterOpen,
        public string $timeToOpen,
        public string $timeToClose,
    ) {
    }

    /**
     * @param array{
     *     name: string,
     *     code: string,
     *     country: string,
     *     is_market_open: bool,
     *     time_after_open: string,
     *     time_to_open: string,
     *     time_to_close: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            code: $data['code'],
            country: $data['country'],
            isMarketOpen: $data['is_market_open'],
            timeAfterOpen: $data['time_after_open'],
            timeToOpen: $data['time_to_open'],
            timeToClose: $data['time_to_close'],
        );
    }
}
