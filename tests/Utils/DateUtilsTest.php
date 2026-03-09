<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Utils;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Utils\DateUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateUtils::class)]
final class DateUtilsTest extends TestCase
{
    public function testFormatDateReturnsFormattedDate(): void
    {
        $date = new DateTimeImmutable('2024-06-15 14:30:00');
        self::assertSame('2024-06-15', DateUtils::formatDate($date));
    }

    public function testFormatDateReturnsNullForNull(): void
    {
        self::assertNull(DateUtils::formatDate(null));
    }

    public function testFormatDateTimeReturnsFormattedDateTime(): void
    {
        $date = new DateTimeImmutable('2024-06-15 14:30:00');
        self::assertSame('2024-06-15 14:30:00', DateUtils::formatDateTime($date));
    }

    public function testFormatDateTimeUses24HourClock(): void
    {
        $date = new DateTimeImmutable('2024-06-15 23:59:59');
        self::assertSame('2024-06-15 23:59:59', DateUtils::formatDateTime($date));
    }

    public function testFormatDateTimeReturnsNullForNull(): void
    {
        self::assertNull(DateUtils::formatDateTime(null));
    }
}
