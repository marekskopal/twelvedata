<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type SplitsSplitType from SplitsSplit
 * @phpstan-type SplitsType array{
 *     meta: MetaType,
 *     splits: list<SplitsSplitType>,
 * }
 */
readonly class Splits
{
    /** @param list<SplitsSplit> $splits */
    public function __construct(public Meta $meta, public array $splits)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var SplitsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param SplitsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            splits: array_map(fn (array $item): SplitsSplit => SplitsSplit::fromArray($item), $data['splits']),
        );
    }
}
