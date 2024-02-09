<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class DividendsDividend
{
    public function __construct(
        public \DateTimeImmutable $exDate,
        public float $amount,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     ex_date: string,
         *     amount: float,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     ex_date: string,
     *     amount: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            exDate: new \DateTimeImmutable($data['ex_date']),
            amount: $data['amount'],
        );
    }
}
