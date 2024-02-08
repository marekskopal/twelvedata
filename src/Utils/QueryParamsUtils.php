<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Utils;

class QueryParamsUtils
{
    public static function booleanAsString(bool $param): string
    {
        return $param === false ? 'false' : 'true';
    }
}
