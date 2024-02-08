<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Utils;

use UnitEnum;

class QueryParamsUtils
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

    /** @param array<UnitEnum> $param */
    public static function enumArrayAsString(array $param): string
    {
        /** @phpstan-ignore-next-line */
        return implode(',', array_map(fn (UnitEnum $item): string => $item->value, $param));
    }
}
