<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class ExchangesData
{
    public function __construct(public string $name, public string $code, public string $country, public string $timezone,)
    {
    }

    /**
     * @param array{
     *     name: string,
     *     code: string,
     *     country: string,
     *     timezone: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name'], code: $data['code'], country: $data['country'], timezone: $data['timezone']);
    }
}
