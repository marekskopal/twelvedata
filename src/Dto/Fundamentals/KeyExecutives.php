<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class KeyExecutives
{
    /** @param list<KeyExecutivesKeyExecutive> $keyExecutives */
    public function __construct(public Meta $meta, public array $keyExecutives)
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
         *     key_executives: list<array{
         *         name: string,
         *         title: string,
         *         age: int,
         *         year_born: int,
         *         pay: int|null,
         *     }>,
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
     *     key_executives: list<array{
     *         name: string,
     *         title: string,
     *         age: int,
     *         year_born: int,
     *         pay: int|null,
     *     }>,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            keyExecutives: array_map(
                fn (array $item): KeyExecutivesKeyExecutive => KeyExecutivesKeyExecutive::fromArray($item),
                $data['key_executives'],
            ),
        );
    }
}
