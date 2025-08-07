<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Utils;

use DateTimeImmutable;

readonly class DateUtils
{
    public const string DATE_FORMAT = 'Y-m-d';
    public const string DATETIME_FORMAT = 'Y-m-d h:i:s';

    public static function formatDate(?DateTimeImmutable $date): ?string
    {
        return $date?->format(self::DATE_FORMAT);
    }

    public static function formatDateTime(?DateTimeImmutable $date): ?string
    {
        return $date?->format(self::DATETIME_FORMAT);
    }
}
