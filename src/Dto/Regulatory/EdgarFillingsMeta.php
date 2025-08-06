<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-type EdgarFillingsMetaType array{
 *     symbol: string,
 *     exchange: string,
 *     mic_code: string,
 *     type: string,
 * }
 */
readonly class EdgarFillingsMeta
{
    public function __construct(public string $symbol, public string $exchange, public string $micCode, public string $type,)
    {
    }

    /** @param EdgarFillingsMetaType $data */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], exchange: $data['exchange'], micCode: $data['mic_code'], type: $data['type']);
    }
}
