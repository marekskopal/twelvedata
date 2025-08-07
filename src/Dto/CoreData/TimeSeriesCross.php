<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

/**
 * @phpstan-import-type TimeSeriesCrossMetaType from TimeSeriesCrossMeta
 * @phpstan-import-type TimeSeriesCrossValueType from TimeSeriesCrossValue
 * @phpstan-type TimeSeriesCrossType array{
 *     meta: TimeSeriesCrossMetaType,
 *     values: list<TimeSeriesCrossValueType>,
 * }
 */
readonly class TimeSeriesCross
{
    /** @param list<TimeSeriesCrossValue> $values */
    public function __construct(public TimeSeriesCrossMeta $meta, public array $values)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var TimeSeriesCrossType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param TimeSeriesCrossType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: TimeSeriesCrossMeta::fromArray($data['meta']),
            values: array_map(
                fn (array $value) => TimeSeriesCrossValue::fromArray($value),
                $data['values'],
            ),
        );
    }
}
