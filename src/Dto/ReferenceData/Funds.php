<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type FundsResultType from FundsResult
 * @phpstan-type FundsType array{
 *     result: FundsResultType,
 *     status: string,
 * }
 */
readonly class Funds
{
    public function __construct(public FundsResult $result, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var FundsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param FundsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: FundsResult::fromArray($data['result']),
            status: $data['status'],
        );
    }
}
