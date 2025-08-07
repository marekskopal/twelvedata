<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum SanctionsSourceEnum: string
{
    case Ofac = 'ofac';
    case Uk = 'uk';
    case Eu = 'eu';
    case Au = 'au';
}
