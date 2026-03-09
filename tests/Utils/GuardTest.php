<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Utils;

use MarekSkopal\TwelveData\Exception\InvalidArgumentException;
use MarekSkopal\TwelveData\Utils\Guard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Guard::class)]
#[UsesClass(InvalidArgumentException::class)]
final class GuardTest extends TestCase
{
    public function testRequireSymbolIdentifierPassesWithSymbol(): void
    {
        Guard::requireSymbolIdentifier(symbol: 'AAPL', figi: null, isin: null, cusip: null);
        $this->expectNotToPerformAssertions();
    }

    public function testRequireSymbolIdentifierPassesWithFigi(): void
    {
        Guard::requireSymbolIdentifier(symbol: null, figi: 'BBG000B9XRY4', isin: null, cusip: null);
        $this->expectNotToPerformAssertions();
    }

    public function testRequireSymbolIdentifierPassesWithIsin(): void
    {
        Guard::requireSymbolIdentifier(symbol: null, figi: null, isin: 'US0378331005', cusip: null);
        $this->expectNotToPerformAssertions();
    }

    public function testRequireSymbolIdentifierPassesWithCusip(): void
    {
        Guard::requireSymbolIdentifier(symbol: null, figi: null, isin: null, cusip: '037833100');
        $this->expectNotToPerformAssertions();
    }

    public function testRequireSymbolIdentifierThrowsWhenAllNull(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Guard::requireSymbolIdentifier(symbol: null, figi: null, isin: null, cusip: null);
    }
}
