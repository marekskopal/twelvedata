<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class InstrumentType
{
    /** @param list<string> $result */
    public function __construct(public array $result, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     result: list<string>,
         *     status: string,
         * } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     result: list<string>,
     *     status: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(result: $data['result'], status: $data['status']);
    }
}
