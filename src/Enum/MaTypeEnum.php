<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum MaTypeEnum: string
{
    case SMA = 'SMA';
    case EMA = 'EMA';
    case WMA = 'WMA';
    case DEMA = 'DEMA';
    case TEMA = 'TEMA';
    case TRIMA = 'TRIMA';
    case KAMA = 'KAMA';
    case MAMA = 'MAMA';
    case T3MA = 'T3MA';
}
