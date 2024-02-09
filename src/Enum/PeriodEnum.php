<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum PeriodEnum: string
{
    case Latest = 'latest';
    case Next = 'next';
}
