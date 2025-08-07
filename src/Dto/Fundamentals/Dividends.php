<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type DividendsDividendType from DividendsDividend
 * @phpstan-type DividendsType array{
 *     meta: MetaType,
 *     dividends: list<DividendsDividendType>,
 * }
 */
readonly class Dividends
{
    /** @param list<DividendsDividend> $dividends */
    public function __construct(public Meta $meta, public array $dividends,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var DividendsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param DividendsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            dividends: array_map(fn (array $item): DividendsDividend => DividendsDividend::fromArray($item), $data['dividends']),
        );
    }
}
