<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class OptionsChain
{
    /**
     * @param list<OptionsChainOption> $calls
     * @param list<OptionsChainOption> $puts
     */
    public function __construct(public Meta $meta, public array $calls, public array $puts)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     meta: array{
         *         symbol: string,
         *         name: string,
         *         currency: string,
         *         exchange: string,
         *         mic_code: string,
         *         exchange_timezone: string,
         *     },
         *     calls: list<array{
         *         contract_name: string,
         *         option_id: string,
         *         last_trade_date: string,
         *         strike: int,
         *         last_price: float,
         *         bid: float,
         *         ask: float,
         *         change: float,
         *         percent_change: float,
         *         volume: int,
         *         open_interest: int,
         *         implied_volatility: float,
         *         in_the_money: bool,
         *     }>,
         *     puts: list<array{
         *         contract_name: string,
         *         option_id: string,
         *         last_trade_date: string,
         *         strike: int,
         *         last_price: float,
         *         bid: float,
         *         ask: float,
         *         change: float,
         *         percent_change: float,
         *         volume: int,
         *         open_interest: int,
         *         implied_volatility: float,
         *         in_the_money: bool,
         *     }>
         *
         * } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     meta: array{
     *         symbol: string,
     *         name: string,
     *         currency: string,
     *         exchange: string,
     *         mic_code: string,
     *         exchange_timezone: string,
     *     },
     *     calls: list<array{
     *         contract_name: string,
     *         option_id: string,
     *         last_trade_date: string,
     *         strike: float,
     *         last_price: float,
     *         bid: float,
     *         ask: float,
     *         change: float,
     *         percent_change: float,
     *         volume: int,
     *         open_interest: int,
     *         implied_volatility: float,
     *         in_the_money: bool,
     *     }>,
     *     puts: list<array{
     *         contract_name: string,
     *         option_id: string,
     *         last_trade_date: string,
     *         strike: float,
     *         last_price: float,
     *         bid: float,
     *         ask: float,
     *         change: float,
     *         percent_change: float,
     *         volume: int,
     *         open_interest: int,
     *         implied_volatility: float,
     *         in_the_money: bool,
     *     }>
     *
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            calls: array_map(
                fn (array $item): OptionsChainOption => OptionsChainOption::fromArray($item),
                $data['calls'],
            ),
            puts: array_map(
                fn (array $item): OptionsChainOption => OptionsChainOption::fromArray($item),
                $data['puts'],
            ),
        );
    }
}
