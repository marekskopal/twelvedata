<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Dto\ForexPairsList;
use MarekSkopal\TwelveData\Dto\StockList;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\TestCase;

class ReferenceDataTest extends TestCase
{
    public function testStockList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            StockList::class,
            $referenceData->stockList('AAPL'),
        );
    }

    public function testForexPairsList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            ForexPairsList::class,
            $referenceData->forexPairsList('EUR/USD'),
        );
    }
}
