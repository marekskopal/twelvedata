<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Utils;

use BackedEnum;

readonly class QueryParamsUtils
{
    public static function booleanAsString(?bool $param): ?string
    {
        if ($param === null) {
            return null;
        }

        return $param === false ? 'false' : 'true';
    }

    /** @param array<string>|null $param */
    public static function arrayAsString(?array $param): ?string
    {
        if ($param === null) {
            return null;
        }

        return implode(',', $param);
    }

    /** @param array<BackedEnum>|null $param */
    public static function enumArrayAsString(?array $param): ?string
    {
        if ($param === null) {
            return null;
        }

        return implode(',', array_map(fn (BackedEnum $item): string => (string) $item->value, $param));
    }
}
