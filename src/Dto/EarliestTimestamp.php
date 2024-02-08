<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class EarliestTimestamp
{
    public function __construct(public string $datetime, public int $unixTime)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     datetime: string,
         *     unix_time: int,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     datetime: string,
     *     unix_time: int,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(datetime: $data['datetime'], unixTime: $data['unix_time']);
    }
}
