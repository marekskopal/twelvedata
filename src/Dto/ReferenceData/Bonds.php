<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type BondsResultType from BondsResult
 * @phpstan-type BondsType array{
 *     result: BondsResultType,
 *     status: string,
 * }
 */
readonly class Bonds
{
    public function __construct(public BondsResult $result, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var BondsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param BondsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: BondsResult::fromArray($data['result']),
            status: $data['status'],
        );
    }
}
