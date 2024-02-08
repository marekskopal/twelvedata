<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum AdjustEnum: string
{
    case All = 'all';
    case Splits = 'splits';
    case Dividends = 'dividends';
    case None = 'none';
}
