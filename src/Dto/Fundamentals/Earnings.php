<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type EarningsEarningType from EarningsEarning
 * @phpstan-type EarningsType array{
 *     meta: MetaType,
 *     earnings: list<EarningsEarningType>,
 * }
 */
readonly class Earnings
{
    /** @param list<EarningsEarning> $earnings */
    public function __construct(public Meta $meta, public array $earnings)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EarningsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EarningsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            earnings: array_map(fn (array $item): EarningsEarning => EarningsEarning::fromArray($item), $data['earnings']),
        );
    }
}
