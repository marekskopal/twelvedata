<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type TechnicalIndicatorsOutputValueType from TechnicalIndicatorsOutputValue
 * @phpstan-import-type TechnicalIndicatorsParameterType from TechnicalIndicatorsParameter
 * @phpstan-import-type TechnicalIndicatorsTintingType from TechnicalIndicatorsTinting
 * @phpstan-type TechnicalIndicatorsTechnicalIndicatorType array{
 *     enable: bool,
 *     full_name: string,
 *     description: string,
 *     type: string,
 *     overlay: bool,
 *     output_values: array<string, TechnicalIndicatorsOutputValueType>,
 *     parameters: array<string, TechnicalIndicatorsParameterType>,
 *     tinting?: array<string, TechnicalIndicatorsTintingType>,
 * }
 */
readonly class TechnicalIndicatorsTechnicalIndicator
{
    /**
     * @param array<string, TechnicalIndicatorsOutputValue> $outputValues
     * @param array<string, TechnicalIndicatorsParameter> $parameters
     * @param array<string, TechnicalIndicatorsTinting>|null $tinting
     */
    public function __construct(
        public bool $enable,
        public string $fullName,
        public string $description,
        public string $type,
        public bool $overlay,
        public array $outputValues,
        public array $parameters,
        public ?array $tinting,
    ) {
    }

    /** @param TechnicalIndicatorsTechnicalIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            enable: $data['enable'],
            fullName: $data['full_name'],
            description: $data['description'],
            type: $data['type'],
            overlay: $data['overlay'],
            outputValues: array_map(
                fn (array $item): TechnicalIndicatorsOutputValue => TechnicalIndicatorsOutputValue::fromArray($item),
                $data['output_values'],
            ),
            parameters: array_map(
                fn (array $item): TechnicalIndicatorsParameter => TechnicalIndicatorsParameter::fromArray($item),
                $data['parameters'],
            ),
            tinting: isset($data['tinting']) ? array_map(
                fn (array $item): TechnicalIndicatorsTinting => TechnicalIndicatorsTinting::fromArray($item),
                $data['tinting'],
            ) : null,
        );
    }
}
