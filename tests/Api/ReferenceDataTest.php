<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\BondsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\BondsListList;
use MarekSkopal\TwelveData\Dto\ReferenceData\BondsListResult;
use MarekSkopal\TwelveData\Dto\ReferenceData\CommoditiesList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrenciesList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrenciesListData;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchangesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\EtfList;
use MarekSkopal\TwelveData\Dto\ReferenceData\EtfListData;
use MarekSkopal\TwelveData\Dto\ReferenceData\Exchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\ForexPairsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\ForexPairsListData;
use MarekSkopal\TwelveData\Dto\ReferenceData\FundsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\FundsListList;
use MarekSkopal\TwelveData\Dto\ReferenceData\FundsListResult;
use MarekSkopal\TwelveData\Dto\ReferenceData\IndicesList;
use MarekSkopal\TwelveData\Dto\ReferenceData\IndicesListData;
use MarekSkopal\TwelveData\Dto\ReferenceData\MarketState;
use MarekSkopal\TwelveData\Dto\ReferenceData\StockList;
use MarekSkopal\TwelveData\Dto\ReferenceData\StockListData;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearchData;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ReferenceData::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(BondsList::class)]
#[UsesClass(BondsListList::class)]
#[UsesClass(BondsListResult::class)]
#[UsesClass(CryptocurrenciesList::class)]
#[UsesClass(CryptocurrenciesListData::class)]
#[UsesClass(CryptocurrencyExchanges::class)]
#[UsesClass(CryptocurrencyExchangesData::class)]
#[UsesClass(EarliestTimestamp::class)]
#[UsesClass(EtfList::class)]
#[UsesClass(EtfListData::class)]
#[UsesClass(Exchanges::class)]
#[UsesClass(ExchangesData::class)]
#[UsesClass(ForexPairsList::class)]
#[UsesClass(ForexPairsListData::class)]
#[UsesClass(FundsList::class)]
#[UsesClass(FundsListList::class)]
#[UsesClass(FundsListResult::class)]
#[UsesClass(IndicesList::class)]
#[UsesClass(IndicesListData::class)]
#[UsesClass(MarketState::class)]
#[UsesClass(StockList::class)]
#[UsesClass(StockListData::class)]
#[UsesClass(SymbolSearch::class)]
#[UsesClass(SymbolSearchData::class)]
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

    public function testCommoditiesList(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            CommoditiesList::class,
            $referenceData->commoditiesList(),
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

    public function testMarketState(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $marketState = $referenceData->marketState('NYSE');

        $this->assertIsArray($marketState);
        $this->assertInstanceOf(MarketState::class, $marketState[0]);
    }

    public function testEarliestTimestamp(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            EarliestTimestamp::class,
            $referenceData->earliestTimestamp('AAPL', IntervalEnum::OneDay),
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
}
