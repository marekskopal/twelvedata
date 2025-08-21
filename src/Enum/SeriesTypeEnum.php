<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum SeriesTypeEnum: string
{
    case Close = 'close';
    case Open = 'open';
    case High = 'high';
    case Low = 'low';
    case Volume = 'volume';
}
