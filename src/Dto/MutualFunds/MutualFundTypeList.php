<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundTypeListType array{
 *     result: array<string, list<string>>,
 *     status: string,
 * }
 */
readonly class MutualFundTypeList
{
    /** @param array<string, list<string>> $result */
    public function __construct(public array $result, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundTypeListType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundTypeListType $data */
    public static function fromArray(array $data): self
    {
        return new self(result: $data['result'], status: $data['status']);
    }
}
