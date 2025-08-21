<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type TechnicalIndicatorsTechnicalIndicatorType from TechnicalIndicatorsTechnicalIndicator
 * @phpstan-type TechnicalIndicatorsType array{
 *     data: array<string, TechnicalIndicatorsTechnicalIndicatorType>,
 *     status: string,
 * }
 */
readonly class TechnicalIndicators
{
    /** @param array<string, TechnicalIndicatorsTechnicalIndicator> $data */
    public function __construct(public array $data, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var TechnicalIndicatorsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param TechnicalIndicatorsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(
                fn (array $item): TechnicalIndicatorsTechnicalIndicator => TechnicalIndicatorsTechnicalIndicator::fromArray($item),
                $data['data'],
            ),
            status: $data['status'],
        );
    }
}
