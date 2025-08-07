<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type LogoMetaType array{
 *     symbol: string,
 *     exchange?: string,
 *  }
 */
readonly class LogoMeta
{
    public function __construct(public string $symbol, public ?string $exchange)
    {
    }

    /** @param LogoMetaType $data */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], exchange: $data['exchange'] ?? null);
    }
}
