<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum RatingChangeEnum: string
{
    case Maintains = 'Maintains';
    case Upgrade = 'Upgrade';
    case Downgrade = 'Downgrade';
    case Initiates = 'Initiates';
    case Reiterates = 'Reiterates';
}
