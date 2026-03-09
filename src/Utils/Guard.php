<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Utils;

use MarekSkopal\TwelveData\Exception\InvalidArgumentException;

readonly class Guard
{
    public static function requireSymbolIdentifier(?string $symbol, ?string $figi, ?string $isin, ?string $cusip,): void
    {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }
    }
}
