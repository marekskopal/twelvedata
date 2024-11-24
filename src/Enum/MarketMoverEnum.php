<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum MarketMoverEnum: string
{
    case Stocks = 'stocks';
    case Etf = 'etf';
    case MutualFunds = 'mutual_funds';
    case Forex = 'forex';
    case Crypto = 'crypto';
}
