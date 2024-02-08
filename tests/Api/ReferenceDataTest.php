<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Dto\BondsList;
use MarekSkopal\TwelveData\Dto\CryptocurrenciesList;
use MarekSkopal\TwelveData\Dto\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\EtfList;
use MarekSkopal\TwelveData\Dto\Exchanges;
use MarekSkopal\TwelveData\Dto\ForexPairsList;
use MarekSkopal\TwelveData\Dto\FundsList;
use MarekSkopal\TwelveData\Dto\IndicesList;
use MarekSkopal\TwelveData\Dto\StockList;
use MarekSkopal\TwelveData\Dto\SymbolSearch;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ReferenceData::class)]
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

    public function testCryptocurrenciesList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            CryptocurrenciesList::class,
            $referenceData->cryptocurrenciesList('BTC/USD'),
        );
    }

    public function testEtfList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            EtfList::class,
            $referenceData->etfList('QQQ'),
        );
    }

    public function testIndicesList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            IndicesList::class,
            $referenceData->indicesList('IXIC'),
        );
    }

    public function testFundsList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            FundsList::class,
            $referenceData->fundsList('0P00000AMH'),
        );
    }

    public function testBondsList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            BondsList::class,
            $referenceData->bondsList('AJXA'),
        );
    }

    public function testExchanges(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Exchanges::class,
            $referenceData->exchanges('etf'),
        );
    }

    public function testCryptocurrencyExchanges(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            CryptocurrencyExchanges::class,
            $referenceData->cryptocurrencyExchanges(),
        );
    }

    public function testSymbolSearch(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            SymbolSearch::class,
            $referenceData->symbolSearch('AA'),
        );
    }

    public function testEarliestTimestamp(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            EarliestTimestamp::class,
            $referenceData->earliestTimestamp('AAPL', IntervalEnum::OneDay),
        );
    }
}
