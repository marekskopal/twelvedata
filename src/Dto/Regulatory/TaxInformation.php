<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-import-type TaxInformationMetaType from TaxInformationMeta
 * @phpstan-import-type TaxInformationDataType from TaxInformationData
 * @phpstan-type TaxInformationType array{
 *     meta: TaxInformationMetaType,
 *     data: TaxInformationDataType,
 * }
 */
readonly class TaxInformation
{
    public function __construct(public TaxInformationMeta $meta, public TaxInformationData $data)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var TaxInformationType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param TaxInformationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: TaxInformationMeta::fromArray($data['meta']),
            data: TaxInformationData::fromArray($data['data']),
        );
    }
}
