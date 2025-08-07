<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type AccessType from Access
 * @phpstan-type ExchangesDataType array{
 *     name: string,
 *     code: string,
 *     country: string,
 *     timezone: string,
 *     access?: AccessType
 * }
 */
readonly class ExchangesData
{
    public function __construct(
        public string $name,
        public string $code,
        public string $country,
        public string $timezone,
        public ?Access $access,
    ) {
    }

    /** @param ExchangesDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            code: $data['code'],
            country: $data['country'],
            timezone: $data['timezone'],
            access: ($data['access'] ?? null) !== null ? Access::fromArray($data['access']) : null,
        );
    }
}
