<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-import-type EdgarFillingsMetaType from EdgarFillingsMeta
 * @phpstan-import-type EdgarFillingsValueType from EdgarFillingsValue
 * @phpstan-type EdgarFillingsType array{
 *     meta: EdgarFillingsMetaType,
 *     values: list<EdgarFillingsValueType>,
 * }
 */
readonly class EdgarFillings
{
    /** @param list<EdgarFillingsValue> $values */
    public function __construct(public EdgarFillingsMeta $meta, public array $values)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EdgarFillingsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EdgarFillingsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: EdgarFillingsMeta::fromArray($data['meta']),
            values: array_map(
                static fn (array $item): EdgarFillingsValue => EdgarFillingsValue::fromArray($item),
                $data['values'],
            ),
        );
    }
}
