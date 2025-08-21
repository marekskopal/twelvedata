<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators;

/**
 * @template T of ValueInterface
 * @phpstan-import-type MetaType from Meta
 * @phpstan-type TechnicalIndicatorType array{
 *     meta: MetaType,
 *     values: list<array<string, scalar>>,
 *     status: string,
 * }
 */
readonly class TechnicalIndicator
{
    /** @param list<T> $values */
    public function __construct(public Meta $meta, public array $values, public string $status,)
    {
    }

    /**
     * @param class-string<T> $valueClass
     * @return self<T>
     */
    public static function fromJson(string $valueClass, string $json): self
    {
        /** @var TechnicalIndicatorType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($valueClass, $responseContents);
    }

    /**
     * @param class-string<T> $valueClass
     * @param TechnicalIndicatorType $data
     * @return self<T>
     */
    public static function fromArray(string $valueClass, array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            values: array_map(
                static function (array $item) use ($valueClass): ValueInterface {
                    /** @var T $instance */
                    $instance = $valueClass::fromArray($item);
                    return $instance;
                },
                $data['values'],
            ),
            status: $data['status'],
        );
    }
}
