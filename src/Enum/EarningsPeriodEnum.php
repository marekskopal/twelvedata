<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum EarningsPeriodEnum: string
{
    case Latest = 'latest';
    case Next = 'next';
}
