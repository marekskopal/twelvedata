<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class OptionsChainOption
{
    public function __construct(
        public string $contractName,
        public string $optionId,
        public string $lastTradeDate,
        public float $strike,
        public float $lastPrice,
        public float $bid,
        public float $ask,
        public float $change,
        public float $percentChange,
        public int $volume,
        public int $openInterest,
        public float $impliedVolatility,
        public bool $inTheMoney,
    ) {
    }

    /**
     * @param array{
     *     contract_name: string,
     *     option_id: string,
     *     last_trade_date: string,
     *     strike: float,
     *     last_price: float,
     *     bid: float,
     *     ask: float,
     *     change: float,
     *     percent_change: float,
     *     volume: int,
     *     open_interest: int,
     *     implied_volatility: float,
     *     in_the_money: bool,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            contractName: $data['contract_name'],
            optionId: $data['option_id'],
            lastTradeDate: $data['last_trade_date'],
            strike: $data['strike'],
            lastPrice: $data['last_price'],
            bid: $data['bid'],
            ask: $data['ask'],
            change: $data['change'],
            percentChange: $data['percent_change'],
            volume: $data['volume'],
            openInterest: $data['open_interest'],
            impliedVolatility: $data['implied_volatility'],
            inTheMoney: $data['in_the_money'],
        );
    }
}
