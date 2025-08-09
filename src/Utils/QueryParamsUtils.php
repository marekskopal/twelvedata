<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Utils;

use BackedEnum;

readonly class QueryParamsUtils
{
    public static function booleanAsString(bool $param): string
    {
        return $param === false ? 'false' : 'true';
    }

    /** @param array<string> $param */
    public static function arrayAsString(array $param): string
    {
        return implode(',', $param);
    }

    /** @param array<BackedEnum> $param */
    public static function enumArrayAsString(array $param): string
    {
        return implode(',', array_map(fn (BackedEnum $item): string => (string) $item->value, $param));
    }
}
