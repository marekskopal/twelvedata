<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

use MarekSkopal\TwelveData\Dto\Fundamentals\Meta;

readonly class InsiderTransactions
{
    /** @param list<InsiderTransactionsInsiderTransaction> $insiderTransactions */
    public function __construct(public Meta $meta, public array $insiderTransactions)
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
         *     insider_transactions: list<array{
         *         full_name: string,
         *         position: string,
         *         date_reported: string,
         *         is_direct: bool,
         *         shares: int,
         *         value: int|null,
         *         description: string,
         *     }>
         *  } $responseContents
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
     *     insider_transactions: list<array{
     *         full_name: string,
     *         position: string,
     *         date_reported: string,
     *         is_direct: bool,
     *         shares: int,
     *         value: int|null,
     *         description: string,
     *     }>
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            insiderTransactions: array_map(
                fn (array $item): InsiderTransactionsInsiderTransaction => InsiderTransactionsInsiderTransaction::fromArray($item),
                $data['insider_transactions'],
            ),
        );
    }
}
