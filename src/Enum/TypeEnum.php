<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum TypeEnum: string
{
    case AmericanDepositaryReceipt = 'American Depositary Receipt';
    case Bond = 'Bond';
    case BondFund = 'Bond Fund';
    case ClosedEndFund = 'Closed-end Fund';
    case CommonStock = 'Common Stock';
    case DepositaryReceipt = 'Depositary Receipt';
    case DigitalCurrency = 'Digital Currency';
    case ETF = 'ETF';
    case ExchangeTradedNote = 'Exchange-Traded Note';
    case GlobalDepositaryReceipt = 'Global Depositary Receipt';
    case LimitedPartnership = 'Limited Partnership';
    case MutualFund = 'Mutual Fund';
    case PhysicalCurrency = 'Physical Currency';
    case PreferredStock = 'Preferred Stock';
    case REIT = 'REIT';
    case Right = 'Right';
    case StructuredProduct = 'Structured Product';
    case Trust = 'Trust';
    case Unit = 'Unit';
    case Warrant = 'Warrant';
}
