<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\ReferenceData\Discovery;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListings;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListingsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListingsResult;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearchData;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Discovery::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(CrossListings::class)]
#[UsesClass(CrossListingsList::class)]
#[UsesClass(CrossListingsResult::class)]
#[UsesClass(EarliestTimestamp::class)]
#[UsesClass(SymbolSearch::class)]
#[UsesClass(SymbolSearchData::class)]
final class DiscoveryTest extends TestCase
{
    public function testSymbolSearch(): void
    {
        $referenceData = new Discovery(ClientFixture::createDemo());

        self::assertInstanceOf(
            SymbolSearch::class,
            $referenceData->symbolSearch('AA'),
        );
    }

    public function testCrossListings(): void
    {
        $referenceData = new Discovery(ClientFixture::createWithResponse('cross_listings.json'));

        self::assertInstanceOf(
            CrossListings::class,
            $referenceData->crossListings('NVDA'),
        );
    }

    public function testEarliestTimestamp(): void
    {
        $referenceData = new Discovery(ClientFixture::createDemo());

        self::assertInstanceOf(
            EarliestTimestamp::class,
            $referenceData->earliestTimestamp('AAPL', IntervalEnum::OneDay),
        );
    }
}
