<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\ReferenceData\Discovery;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListings;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearchData;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Discovery::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(CrossListings::class)]
#[UsesClass(EarliestTimestamp::class)]
#[UsesClass(SymbolSearch::class)]
#[UsesClass(SymbolSearchData::class)]
final class DiscoveryTest extends TestCase
{
    public function testSymbolSearch(): void
    {
        $referenceData = new Discovery(ClientFixture::createDemo());

        $this->assertInstanceOf(
            SymbolSearch::class,
            $referenceData->symbolSearch('AA'),
        );
    }

    public function testCrossListings(): void
    {
        $referenceData = new Discovery(ClientFixture::createWithResponse('cross_listings.json'));

        $this->assertInstanceOf(
            CrossListings::class,
            $referenceData->crossListings('NVDA'),
        );
    }

    public function testEarliestTimestamp(): void
    {
        $referenceData = new Discovery(ClientFixture::createDemo());

        $this->assertInstanceOf(
            EarliestTimestamp::class,
            $referenceData->earliestTimestamp('AAPL', IntervalEnum::OneDay),
        );
    }
}
